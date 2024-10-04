<?php
require_once 'app/HomeController.php';
require_once 'app/RegisterController.php';
require_once 'app/LoginController.php';

// app\HomeController.php

// include 'ChromePhp.php';

//Array to store our routes
$routes = [];

//Register routes
$routes['/'] = ['controller' => 'HomeController', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/home'] = ['controller' => 'HomeController', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/register'] = ['controller' => 'RegisterController', 'method' => 'index', 'httpMethod' => 'GET'];
// $routes['/registerUser'] = ['controller' => 'RegisterController', 'method' => 'index', 'httpMethod' => 'POST'];
$routes['/login'] = ['controller' => 'LoginController', 'method' => 'index', 'httpMethod' => 'GET'];

//Route function to handle requests
function route($path) {
    global $routes;
    $separators = ['/', '\\'];
    $path = DIRECTORY_SEPARATOR . $path;

    // print $path;

    // ChromePhp::log($path);

    foreach ($routes as $route => $info) {
        $route = str_replace($separators, DIRECTORY_SEPARATOR, $route);
        // print $route;

        // if ($path === $route && $_SERVER['REQUEST_METHOD'] === $info['httpMethod']) {
        if ($path === $route) {
            $controller = new $info['controller']();
            // print($info['controller']);
            $controller->{$info['method']}();
            return true;
        }
    }

    return false;
}
?>