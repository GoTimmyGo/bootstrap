<?php

//print_r($_SERVER);

function parseUri($uri)
{
    $base = str_replace(".php", "", $_SERVER["PHP_SELF"]);
    $uri = str_replace($base, "", $uri);

    trim($uri, "/");

    $params = array();
    $parts = explode("/", $uri);

    $i = 0;
    while ($i < count($parts))
    {
        $params[$parts[$i]] = $parts[$i + 1];
        $i += 2;
    }

    //for ($i = 0; $i < count($parts); $i += 2) $params[$parts[$i]] = $parts[$i + 1];

    return $params;
}

$request_method = strtolower($_SERVER['REQUEST_METHOD']);
$data = parseUri($_SERVER['REQUEST_URI']);

/*switch ($request_method)
{
    // gets are easy...
    case 'get':
        $data = parseUri($_SERVER['REQUEST_URI']);
        break;
    // so are posts
    case 'post':
        $data = parseUri($_SERVER['REQUEST_URI']);
        break;
    // here's the tricky bit...
    case 'put':
        // basically, we read a string from PHP's special input location,
        // and then parse it out into an array via parse_str... per the PHP docs:
        // Parses str  as if it were the query string passed via a URL and sets
        // variables in the current scope.
        parse_str(file_get_contents('php://input'), $put_vars);
        $data = $put_vars;
        break;
}*/

$response = json_encode(array(
    'method' => strtoupper($request_method),
    'data' => $data
));

exit($response);

echo "method: " . strtoupper($request_method) . "\n";
echo "data: ";
print_r($data);
exit;






require_once('lib/RestControllerLib.php');
require_once('lib/RestRequest.php');
require_once('lib/RestUtils.php');

$data = new RestRequest($_SERVER['REQUEST_URI']);
echo $data->getVerb();

switch((strtoupper($data->getVerb())))
{
    // this is a request for all users, not one in particular
    case 'GET':
        $request_parts = explode('/', $_GET);
        break;
    case "POST":
        echo "post";
        break;
    default:
        echo "dunno: " . $_SERVER['REQUEST_URI'] . "<br>\n";
        print_r($data);
}