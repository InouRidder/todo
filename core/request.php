<?php 

class Request {
    static function uri() : String {
        return trim(
            $_SERVER['REQUEST_URI'], '/'
        );        
    }
}