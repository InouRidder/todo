<?php 

class Todo {    
    public $id;
    public $title;
    public $description;
    public $completed;

    public function __construct($attr)
    {
        $this->id = $attr['id'];
        $this->description = $attr['description'];
        $this->title = $attr['title'];
        $this->completed = $attr['completed'] || 0;
    }

    public function isCompleted() 
    {
        return $this->completed;
    }

    public function get($value) 
    {
        return $this->$value;
    }
}

// $recipe = new Recipe(['title' => 'Salmon Fume', 'description' => 'Cook the salmon', 'completed' => false]);

// echo $recipe->isCooked();
// var_dump($recipe);