<?php

$uri = "http://192.168.0.125/andystrap/api/user/1";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS, null);
$response = curl_exec($ch);
curl_close($ch);

header("HTTP/1.1 200 OK");
header("Content-type: application/json");
header("Cache-Control: no-cache");
header("Expires: " . date("D, d M Y H:i:s", (time() - (86400 * 2))) . " GMT");

print($response);