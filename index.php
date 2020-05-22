<?php

function dd($val) {
    die(var_dump($val));
}
    require 'models/todo.php';
    require 'core/database/repository.php';
    require 'core/routes.php';