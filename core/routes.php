<?php 

require 'core/router.php';

$router = new Router;

$router->init([
    '' => 'todos/index',
    'about' => 'pages/about',
    'contact' => 'pages/contact'
]);

$route = trim(
    $_SERVER['REQUEST_URI'], '/'
);

$result = $router->direct($route);

foreach($result['data'] as $key => $value) {
    $$key = $value;
}

require $result['view'];