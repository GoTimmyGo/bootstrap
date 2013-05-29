<?php

$data = RestUtils::processRequest();

switch($data->getVerb())
{
    // this is a request for all users, not one in particular
    case 'get':
        echo "get";
        break;
    case "post":
        echo "post";
        break;
}