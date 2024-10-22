<?php
    require_once './autoloader.php';
    require_once './router/web.php';

    SessionManager::start();
    // $controllerInstance = new HomeController();
    // $controllerInstance->index();

    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = new Authentication();
    }
    
    $auth = $_SESSION['auth'];

    $router = new Router($auth);

    $router->loadRoutesFromConfig('../app/routes/routes.json');

    if (!isset($_COOKIE['logged_out'])) {
        SessionManager::start();
    }

    define('APP_ROOT_DIR', '400014516/framework'); // MADE EDIT HERE; RETURN THE 2ND PARAM TO: ''
    $separators = ['/', '\\'];

    $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
    $path = str_replace(APP_ROOT_DIR, '', $request_uri[0]);

    $path = trim(str_replace($separators, DIRECTORY_SEPARATOR, $path), DIRECTORY_SEPARATOR);

    //Routing
    // if (!route($path)) {
    //     //If no route is defined
    //     header("HTTP/1.0 404 Not Found");
    //     echo json_encode(["error" => "404 $path Not Found"]);
    // }

    $separators = ['/', '\\'];
    $path = '/' . $path;

    // print_r("Path: " . $path);

    $router->dispatch($path, $_SERVER['REQUEST_METHOD']);
?>