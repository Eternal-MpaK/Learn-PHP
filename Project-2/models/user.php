<?php

namespace App;

include __DIR__ . "/../settings/session.php";

class Model {
    public function user_list_fetch($order) {
        $db = mysqli_connect('localhost', 'root','', 'database');
        if ($order == 0) {
            $data = mysqli_query($db, "SELECT * FROM users ORDER BY age ASC");
            return $data;
        } elseif ($order == 1) {
            $data = mysqli_query($db, "SELECT * FROM users ORDER BY age DESC");
            return $data;
        }
    }

    public function file_list_fetch() {
        $db = mysqli_connect('localhost', 'root','', 'database');
        $data = mysqli_query($db, "SELECT * FROM user_images");
        return $data;
    }

    public function file_upload_fetch($user, $upload_url) {
        $db = mysqli_connect('localhost', 'root','', 'database');
        $result2 = mysqli_query($db,"INSERT INTO user_images (user,image) VALUES('$user','$upload_url')");
        if (!$result2 =='TRUE') {
            echo 'Ошибка добавления в базу данных';
        }
    }

    public function admin_new_user_fetch(array $user_data) {
        $db = mysqli_connect('localhost', 'root','', 'database');
        $result = mysqli_query( $db, "SELECT id FROM users WHERE login='$user_data[login]'");
        $my_row = mysqli_fetch_array($result);
        if (!empty($my_row['id'])) {
            exit ("Логин уже занят");
        }
        $result2 = mysqli_query($db,"INSERT INTO users (login,password,name,age,description) VALUES('$user_data[login]','$user_data[password]','$user_data[name]','$user_data[age]','$user_data[info]')");
        if ($result2=='TRUE')
        {
            echo "<br>Пользователь успешно внесен в базу. ";
        }
        else {
            echo "Ошибка! Пользователь не зарегистрирован.";
        }
    }

    public function new_user_fetch($login, $password) {
        $db = mysqli_connect('localhost', 'root','', 'database');
        $result = mysqli_query( $db, "SELECT id FROM users WHERE login='$login'");
        $my_row = mysqli_fetch_array($result);
        if (!empty($my_row['id'])) {
            exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
        }
        $result2 = mysqli_query($db,"INSERT INTO users (login,password) VALUES('$login','$password')");
        if (!$result2=='TRUE')
        {
            exit('Ошибка! Вы не зарегистрированы.');
        }
    }

    public function verify($login, $password) {
        $db = mysqli_connect('localhost', 'root','', 'database');
        $result = mysqli_query($db,"SELECT * FROM users WHERE login='$login'");
        $my_row = mysqli_fetch_array($result);
        if (empty($my_row['password']))
        {
            exit ("Извините, введённый вами login или пароль неверный.");
        }
        else {
            if (password_verify($password, $my_row['password'])) {
                return $my_row['id'];
            } else {
                exit ("Извините, введённый вами login или пароль неверный.");
            }
        }
    }

    public function avatar_change($user, $img) {
        $db = mysqli_connect('localhost', 'root','', 'database');
        $result = mysqli_query($db,"UPDATE users SET photo='$img' WHERE login='$user'");
        if ($result !== true) {
            exit('Ошибка, аватар не изменен!');
        }
    }
}
