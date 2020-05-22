<?php

class PagesController {
    public function about() {
        return [
            'view' => 'pages/about'
        ];
    }

    public function contact() {
        return [
            'view' => 'pages/contact'
        ];
    }
}

