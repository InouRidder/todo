<?php 

class Todo {    
    public $title;
    public $description;
    protected $completed;

    public function __construct($attr)
    {
        $this->description = $attr['description'];
        $this->title = $attr['title'];
        $this->completed = $attr['completed'] || false;
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