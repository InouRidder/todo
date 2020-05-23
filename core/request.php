<?php 

class Request {
    static function uri() : String {
        return trim(
            $_SERVER['REQUEST_URI'], '/'
        );        
    }


    static function method() : String {
        return $_SERVER['REQUEST_METHOD'];
    }
}