<?php

class Router
{
    protected $routes = [];
    protected $params = [];

    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function match($url)
    {
        // Match based on the url format 'controller/action'
        $reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z]+)$/";

        if (preg_match($reg_exp, $url, $matches)) {
            // Get the named capture group values
            $params = [];

            foreach ($matches as $key => $match) {
                if (is_string($key)) {
                    $params[$key] = $match;
                }
            }

            $this->params = $params;
            return true;
        }
    }

    public function getParams()
    {
        return $this->params;
    }
}
