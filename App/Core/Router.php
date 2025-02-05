<?php

namespace App\Core;

class Router
{
    private $routes = [];
    // Add routes and optional middleware
    public function add($method, $uri, $action, $middleware = [])
    {
        // Store the action and middleware as arrays
        $this->routes[$method][$uri] = [
            'action' => $action, 
            'middleware' => $middleware
        ];
    }
    // Dispatch the route and apply middleware
    public function dispatch($method, $uri)
    {
        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];
            // Apply middleware if defined
            if (!empty($route['middleware'])) {
                // Check if the middleware is an array
                if (is_array($route['middleware'])) {
                    foreach ($route['middleware'] as $middleware => $allowedRoles) {
                        // If $middleware is numeric
                        if (is_numeric($middleware)) {
                            $middleware = $allowedRoles;
                            $allowedRoles = null;
                        }
                        // Build the middleware class name
                        $middlewareClass = "App\\Middleware\\" . $middleware;
                        if (class_exists($middlewareClass)) {
                            // If roles are provided, pass them to the middleware
                            if (is_array($allowedRoles)) {
                                $middlewareClass::handle($allowedRoles);
                            } else {
                                // No roles specified, just call the middleware
                                $middlewareClass::handle();
                            }
                        } else {
                            die("Middleware {$middleware} not found.");
                        }
                    }
                } else {
                    // If middleware is a single string, apply it directly
                    $middlewareClass = "App\\Middleware\\" . $route['middleware'];
                    if (class_exists($middlewareClass)) {
                        $middlewareClass::handle();
                    } else {
                        die("Middleware {$route['middleware']} not found.");
                    }
                }
            }
            // Instantiate Request and Response
            $request = new Request();
            $response = new Response();
            // Get controller and method from the action array
            $action = $route['action'];
            list($controller, $method) = explode('@', $action);
            // Instantiate the controller and call the method
            if (class_exists($controller)) {
                $controllerInstance = new $controller();
                // Check if method needs parameters (Request and response)
                if(method_exists($controllerInstance, $method)) {
                    $reflection = new \ReflectionMethod($controllerInstance, $method);
                    // If method has no parameters, call it directly
                    if (count($reflection->getParameters()) === 0) {
                        return $controllerInstance->$method();
                    }
                    // Otherwise, pass request and response
                    return $controllerInstance->$method($request, $response);
                }
            } else {
                die("Controller {$controller} not found.");
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
