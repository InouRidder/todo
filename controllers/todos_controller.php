<?php 


class TodosController {
    public function index() {
        global $repo;
        $todos = $repo->fetchAll();
        $data = [ 'todos' =>$todos ];

        return [
            'view' => 'views/todos/index.view.php',
            'data' => $data
        ];
    }
    
}