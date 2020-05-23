<?php 

// DI CONTAINER
// Basically a global object carrying all items we need to access in different places

class App {
    public static $registry = [];

    public static function bind($key, $element) {
        self::$registry[$key] = $element;
    }

    public static function resolve($key) {
        return self::$registry[$key];
    }
}