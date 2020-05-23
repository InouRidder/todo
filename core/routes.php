<?php 

// this turned out to be the main app controller really. naming is off.

require 'core/router.php';
require 'core/request.php';

$router = new Router;

$router->init([
    'GET' => [

        '' => 'todos/index',
        'todos/new' => 'todos/new',
        'about' => 'pages/about',
        'contact' => 'pages/contact'
    ],
    'POST' => [
        'todos' => 'todos/create',
        'todos/delete' => 'todos/destroy'
    ]
]);

$result = $router->direct(
    Request::uri(), 
    Request::method()
);

// Not sure how variable scope works yet or how to set the variables from a different closure and scope to global;

// foreach($result['data'] as $key => $value) {
//     $$key = $value;
// }
extract($result['data']);
$result['view'];

require 'views/index.view.php';

// notes: 

// array_column is like ruby's pluck! array_colum($todos, 'title') returns an array of title values of those todos