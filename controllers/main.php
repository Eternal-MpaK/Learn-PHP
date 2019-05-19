<?php
    namespace App;

    class Main {

        public function index() {
//            session_start();
            if (isset($_SESSION['login'])) {
                $login = $_SESSION['login'];
                echo 'Вы вошли как ' . $login;
            }
            $view = new View();
            $view->render("index");
        }

    }