<?php
namespace App;

class View {

    public function render(string $filename) {
        require_once __DIR__."/../views/" . $filename . ".php";
    }
}