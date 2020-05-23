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

    public function new() {
        return [
            'view' => 'views/todos/new.view.php',
            'data' => []
        ];
    }

    public function create() {
        global $repo;
        $todo = new Todo($_POST);
        $repo->save($todo);
        header('Location: /');
    }

    public function edit() {
        global $repo;
        $todo = $repo.find($_GET);

        return [
            'view' => 'views/todos/edit.view.php',
            'data' => ['todo' => $todo]
        ];
    }

    public function destroy() {
        global $repo;
        $repo->delete($_POST['id']);

        header('Location: /');
    }
    
}