<?php 


class TodosController {
    public function index() {
        global $repo;
        $todos = $repo->fetchAll();
        $data = [ 'todos' =>$todos ];

        return [
            'view' => 'views/index.view.php',
            'data' => $data
        ];
    }
}