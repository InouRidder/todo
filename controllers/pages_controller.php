<?php

class PagesController {
    public function about() {
        return [
            'view' => 'views/pages/about.view.php',
            'data' => []
        ];
    }

    public function contact() {
        return [
            'view' => 'views/pages/contact.view.php',
            'data' => []
        ];
    }
}

