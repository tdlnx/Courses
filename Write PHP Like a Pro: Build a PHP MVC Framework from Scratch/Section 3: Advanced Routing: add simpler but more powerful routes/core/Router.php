<?php

class Router
{
    protected $routes = [];
    protected $params = [];

    public function add($route, $params = [])
    {
        // Convert the route to a regular expression
        $route = preg_replace('/\//', '\\/', $route); //-> Escape forward slahes
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route); //-> Convert variables
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route); //-> Convert variables with regular expressions
        $route = '/^' . $route . '$/i'; //-> add start/end and case insensitive flag
        // ===

        $this->routes[$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function match($url)
    {
        // Match based on the url format 'controller/action'
        // $reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z]+)$/";
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get the named capture group values
                // $params = [];

                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function getParams()
    {
        return $this->params;
    }
}
