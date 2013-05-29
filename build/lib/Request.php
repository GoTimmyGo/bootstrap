<?php

class Request
{
    public $url_elements;
    public $verb;
    public $parameters;

    public function __construct()
    {
        $this->verb = $_SERVER['REQUEST_METHOD'];
        $this->url_elements = explode('/', (!empty($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : str_replace(str_replace(".php", "", $_SERVER["PHP_SELF"]), "", $_SERVER['REQUEST_URI']));
        $this->parseIncomingParams();
        $this->format = (isset($this->parameters['format'])) ? $this->parameters['format'] : "json";

        return true;
    }

    public function parseIncomingParams()
    {
        $parameters = array();

        if (isset($_SERVER['QUERY_STRING'])) parse_str($_SERVER['QUERY_STRING'], $parameters);

        $body = file_get_contents("php://input");
        $content_type = (isset($_SERVER['CONTENT_TYPE'])) ? $_SERVER['CONTENT_TYPE'] : false;

        switch ($content_type)
        {
            case "application/json":
                $body_params = json_decode($body);



        }
    }
}