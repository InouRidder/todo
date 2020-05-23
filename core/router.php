<?php 

class Router {
    
    protected $routes;

    public function init($routes) 
    {
        return $this->routes = $routes;
    }

    public function actionToController($action) : Array {
        [$controller_name, $controller_action] = explode('/', $action);
        $controller_stringified = ucfirst($controller_name).'Controller';
        $controller = new $controller_stringified();
        return $controller->$controller_action();
    }

    public function direct($uri, $method) : Array {
        // die(var_dump($method));

        if (array_key_exists($uri, $this->routes[$method])) {
            $action = $this->routes[$method][$uri];
            $result = $this->actionToController($action);
            return $result;
        } else {
            die("Route not found for $uri and $method");
        }
         

    }
}