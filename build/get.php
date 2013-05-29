<?php

$uri = "http://192.168.0.125/andystrap/api/user/1";
$response = file_get_contents($uri);

header("HTTP/1.1 200 OK");
header("Content-type: application/json");
header("Cache-Control: no-cache");
header("Expires: " . date("D, d M Y H:i:s", (time() - (86400 * 2))) . " GMT");

print($response);