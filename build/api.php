<?php

include("lib/Request.php");

$request = new Request();
print_r($request);

function parseUri($uri)
{
    $i = 0;
    $params = array();
    $base = str_replace(".php", "", $_SERVER["PHP_SELF"]);
    $path_info = str_replace($base, "", $uri);
    $parts = explode("/", trim($path_info, "/"));

    while ($i < count($parts))
    {
        $params[$parts[$i]] = $parts[$i + 1];
        $i += 2;
    }

    return $params;
}

$request_method = strtolower($_SERVER['REQUEST_METHOD']);
$data = parseUri($_SERVER['REQUEST_URI']);
$response = json_encode(array(
    'method' => strtoupper($request_method),
    'data' => $data
));

exit($response);