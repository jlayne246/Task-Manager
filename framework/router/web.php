<?php

// app\HomeController.php

// include 'ChromePhp.php';

//Array to store our routes
$routes = [];

//Register routes
$routes['/'] = ['controller' => 'HomeController', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/home'] = ['controller' => 'HomeController', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/register'] = ['controller' => 'RegisterController', 'method' => 'index', 'httpMethod' => 'GET'];

$routes['/login'] = ['controller' => 'LoginController', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/logout'] = ['controller' => 'LogoutController', 'method' => 'index', 'httpMethod' => 'GET'];

$routes['/admin'] = ['controller' => 'AdminDashboard', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/editrole'] = ['controller' => 'AdminDashboard', 'method' => 'update', 'httpMethod' => 'POST'];
$routes['/deleteuser'] = ['controller' => 'AdminDashboard', 'method' => 'delete', 'httpMethod' => 'GET'];
$routes['/createuser'] = ['controller' => 'AdminDashboard', 'method' => 'create', 'httpMethod' => 'POST'];

$routes['/manager'] = ['controller' => 'ManagerDashboard', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/view-task'] = ['controller'=> 'ViewEditTasks', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/edit-task'] = ['controller'=> 'ViewEditTasks', 'method' => 'edit', 'httpMethod' => 'POST'];
$routes['/filter'] = ['controller'=> 'ManagerDashboard', 'method' => 'filter', 'httpMethod' => 'POST'];

$routes['/employee'] = ['controller' => 'EmployeeDashboard', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/update-progress'] = ['controller' => 'EmployeeDashboard', 'method' => 'update', 'httpMethod' => 'POST'];
$routes['/create-comment'] = ['controller' => 'EmployeeDashboard', 'method' => 'create', 'httpMethod' => 'POST'];

$routes['/tasks'] = ['controller' => 'TaskManager', 'method' => 'index', 'httpMethod' => 'GET'];
$routes['/create-task'] = ['controller' => 'TaskManager', 'method' => 'create', 'httpMethod' => 'POST'];

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