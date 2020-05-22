<?php 

require 'core/router.php';
require 'core/request.php';

$router = new Router;

$router->init([
    '' => 'todos/index',
    'about' => 'pages/about',
    'contact' => 'pages/contact'
]);

$route = Request::uri();

$result = $router->direct($route);

// Not sure how variable scope works yet or how to set the variables from a different closure and scope to global;
foreach($result['data'] as $key => $value) {
    $$key = $value;
}

$result['view'];

require 'views/index.view.php';