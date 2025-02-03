<?php
namespace App\Core;
class Router
{
    private $routes = [];
    public function add($method, $uri, $action)
    {
        $this->routes[$method][$uri] = $action;
    }
    public function dispatch($method, $uri)
    {
        if(isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];
            list($controller, $method) = explode('@', $action);
            // Resolve controller dynamically using namespaces
            $controller = new $controller();
            return $controller->$method();
        }
        echo "404 Not Found";
    }
}