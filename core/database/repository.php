<?php

class Repository {

    protected $dbString;
    protected $config;

    public function __construct($db_config) {
        $this->dbString = "mysql:host={$db_config['host']};dbname={$db_config['name']}";
        $this->config = $db_config;
        $this->connectToDB();
    }

    public function delete($id) {
        $statement = $this->pdo->prepare("DELETE FROM todos WHERE id = $id");
        return $statement->execute();
    }
    
    public function connectToDB() {
        try {
            $pdo = new PDO(
                $this->dbString, 
                'root', 
                $db_config['password'], 
                $db_config['options']
            );
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;

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

    public function insert($todo) {
        $values = [];
        $columns = [];
    
        foreach($todo as $attribute => $value){
            if ($attribute == 'id') {
                continue;
            };
            $values[] =  $value ? "'$value'" : 0;
            $columns[] = $attribute;
        }
        
        $str_values = join($values, ', ');
        $str_columns = join($columns, ', ');
        $db_name = $this->config['name'];
        
        $sql = "INSERT INTO todos ($str_columns) VALUES ($str_values)";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute();
    }

    public function save($todo) {
        if ($todo->id) {
            $this->update($todo);
        } else {
            $this->insert($todo);
        }
    }

    public function update($todo) {
        $pairs = [];
        foreach($todo as $attribute => $value) {
            if ($attribute == 'id') {
                continue;
            };
            $pairs[] = "$attribute=$value";
        }
        $str_pairs = join($pairs, ",");

        $statement = $this->pdo->prepare("UPDATE {$db_config['name']} SET $str_pairs WHERE id = {$todo->id};");
        $statement->execute();
    }
    
    public static function imAClassMethod() {
        echo "CLASSY!";
        echo "Call me as so Repository::imAClassMethod();";
    }    
}

