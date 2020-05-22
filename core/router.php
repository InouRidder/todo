<?php 

class Router {
    
    protected $routes;

    public function init($routes) 
    {
        return $this->routes = $routes;
    }

    public function actionToController($action) {
        [$controller_name, $controller_action] = explode('/', $action);
        $controller_stringified = ucfirst($controller_name).'Controller';
        $controller = new $controller_stringified();
        return $controller->$controller_action();
    }

    public function direct($uri) {
        if (array_key_exists($uri, $this->routes)) {
            $action = $this->routes[$uri];
        } 

        $result = $this->actionToController($action);
        return $result;

        throw new Exception;
    }
}