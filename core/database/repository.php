<?php

class Repository {

    protected $dbString;
    protected $config;

    public function __construct($db_config) {
        $this->dbString = "mysql:host={$db_config['host']};dbname={$db_config['name']}";
        $this->config = $db_config;
        $this->connectToDB();
    }
    
    public function connectToDB() {
        try {
            $this->pdo = new PDO($this->dbString, 'root', $db_config['password']);

        } catch(PDOException $e) {
            die('Could not connect');
        }
    }
    
    public function convert(Array $arr) : Todo {
        return new Todo($arr);
    }
    
    public function fetchAll() : Array {
        $statement = $this->pdo->prepare('SELECT * FROM todos');
        $statement->execute();
        $todos_array = $statement->fetchAll();
        return array_map("Repository::convert", $todos_array);
    }
    
    public static function imAClassMethod() {
        echo "CLASSY!";
        echo "Call me as so Repository::imAClassMethod();";
    }    
}

$config = require 'config.php';
$db_config = $config['database'];

$repo = new Repository($db_config);
$todos = $repo->fetchAll();