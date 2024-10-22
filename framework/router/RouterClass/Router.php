<?php
class Router {
    private $routes = [];
    private $auth;

    public function __construct(Authentication $auth) {
        $this->auth = $auth;
    }

    // Load routes from a configuration file (JSON in this case)
    public function loadRoutesFromConfig($configFile) {
        $jsonData = file_get_contents($configFile);
        $routes = json_decode($jsonData, true);

        foreach ($routes as $route => $details) {
            $this->addRoute(
                $route, 
                $details['controller'], 
                $details['method'], 
                $details['httpMethod'], 
                $details['access']
            );
        }
    }

    public function addRoute($route, $controller, $method, $httpMethod, $access = null) {
        $this->routes[$route] = [
            'controller' => $controller,
            'method' => $method,
            'httpMethod' => $httpMethod,
            'access' => $access
        ];
    }

    public function dispatch($route, $httpMethod) {
        if (!isset($this->routes[$route])) {
            echo "404 Not Found";
            return;
        }

        $routeDetails = $this->routes[$route];

        // if ($routeDetails['httpMethod'] !== $httpMethod) {
        //     echo "405 Method Not Allowed";
        //     return;
        // }

        if (!$this->auth->checkAuthentication() && $this->auth->checkLoginStatus()) {
            echo "401 Unauthorized";
            return;
        }

        if (!$this->auth->checkPermission($routeDetails['access'])) {
            echo "403 Forbidden";
            return;
        }

        $controller = new $routeDetails['controller']();
        $method = $routeDetails['method'];
        $controller->$method();
    }
}

?>