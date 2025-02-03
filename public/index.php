<?php
require_once '../vendor/autoload.php';
use App\Core\Router;
$router = new Router();
// Include routes from the autoloaded routes.php file
$routes = require '../config/routes.php';
// Register routes with the router
foreach($routes as $method => $route) {
    foreach($route as $uri => $action) {
        $router->add($method, $uri, implode('@', $action));
    }
}
// Dispatch the request
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);