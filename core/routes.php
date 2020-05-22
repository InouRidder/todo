<?php 

require 'core/router.php';

$router = new Router;

$router->init([
    '' => 'views/index.view.php',
    'about' => 'views/about.php'
]);

$view = $router->direct(trim($_SERVER['REQUEST_URI'], '/'));

require $view;