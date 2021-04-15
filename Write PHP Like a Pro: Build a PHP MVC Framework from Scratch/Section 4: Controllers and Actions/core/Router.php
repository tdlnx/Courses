<?php

namespace core;

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

    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "app\controllers\\$controller";

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    echo "Method {$action} (in controller {$controller}) not found.";
                }
            } else {
                echo "Controller class {$controller} not found.";
            }
        } else {
            'No route matched.';
        }
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

    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }
}
