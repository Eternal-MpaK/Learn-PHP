<?php
    namespace App;
    include __DIR__ . '\..\settings\session.php';
    include __DIR__ . '\..\models\user.php';
    include __DIR__ . '\functions.php';
    
    class Users  {

        public function admin() {
            require_once __DIR__.'/../views/admin.php';
            if(isset($_POST['new_user_login'])) {
                $new_user = new Fun();
                $new_user->admin_new_user();
            }
        }

        public function new_image() {
            require_once __DIR__.'/../views/upload.php';
            if(isset($_FILES['avatar'])) {
                $upload = new Fun();
                $upload->upload($_SESSION['login']);
            }
        }

        public function registration() {
            if (isset($_POST['login'])) {
                $new_user = new Fun();
                $new_user->new_user();
                require_once __DIR__.'/../views/reg_completed.php';
            } else {
                require_once __DIR__ . '/../views/reg.php';
            }
        }

        public function authentication() {
            if (isset($_POST['login'])) {
                $new_user = new Fun();
                $new_user->authentication_check();
                require_once __DIR__.'/../views/auth_completed.php';
            } else {
                require_once __DIR__.'/../views/auth.php';
            }
        }

        public function files() {
            require_once __DIR__.'/../views/file_list.php';
            $file_list = new Fun();
            $file_list->file_list();
        }

        public function index() {
            $order = 0;
            if (isset($_POST['order'])) { $order = $_POST['order'];}
            require __DIR__.'/../views/list.php';
            $user_list = new Fun();
            $user_list->user_list($order);
        }

        public function change_avatar() {
            $user = $_POST['user'];
            $img = $_POST['img'];
            $new_ava = new Model();
            $new_ava->avatar_change($user, $img);
            echo 'Аватар пользователя '. $user .' успешно изменен.<br><a href=\'../../\'>Вернуться</a>';
        }
    }










