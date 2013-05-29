<?php

define("AUTH_REALM", "Restricted area");

$auth_username = "test";
$auth_pass = "testtest";

require_once('lib/RestControllerLib.php');
require_once('lib/RestUtils.php');
require_once('lib/RestRequest.php');

// figure out if we need to challenge the user
if(empty($_SERVER['PHP_AUTH_DIGEST']))
{
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="' . AUTH_REALM . '",qop="auth",nonce="' . uniqid() . '",opaque="' . md5(AUTH_REALM) . '"');

    // show the error if they hit cancel
    die(RestControllerLib::error(401, true));
}

// now, analayze the PHP_AUTH_DIGEST var
if(!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) || $auth_username != $data['username'])
{
    // show the error due to bad auth
    die(RestUtils::sendResponse(401));
}

// so far, everything's good, let's now check the response a bit more...
$A1 = md5($data['username'] . ':' . AUTH_REALM . ':' . $auth_pass);
$A2 = md5($_SERVER['REQUEST_METHOD'] . ':' . $data['uri']);
$valid_response = md5($A1 . ':' . $data['nonce'] . ':' . $data['nc'] . ':' . $data['cnonce'] . ':' . $data['qop'] . ':' . $A2);

// last check..
if($data['response'] != $valid_response)
{
    die(RestUtils::sendResponse(401));
}

function http_digest_parse($txt)
{
    // protect against missing data
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();

    preg_match_all('@(\w+)=(?:([\'"])([^\2]+)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}