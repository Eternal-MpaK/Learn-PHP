<?php
namespace App;

    class Fun {
        public function file_list() {
            $data = new Model();
            $data = $data->file_list_fetch();
            if ($data) {
                $rows = mysqli_num_rows($data);
                for ($i = 0; $i < $rows; ++$i) {
                    $row = mysqli_fetch_row($data);
                    echo "<img height='100px' width='100px' src='" . $row[2] . '\'></img>';
                    if (isset($_POST['user'])) {
                        $user = $_POST['user'];
                        echo '<form name="avatar_img" action="change_avatar" method="post">
                                <input type="hidden" name="user" value="'. $user .'">
                                <button type="submit" name="img" value="'. $row[2].'">Выбрать фото</button>
                              </form>';
                    } else {
                        echo '<br>';
                    }
                }
            }
            echo '<br><a href=\'../../\'>Вернуться</a> ';
        }

        public function index() {
            $order = 0;
            if (isset($_POST['order'])) { $order = $_POST['order'];}
            require __DIR__.'/../views/list.php';
            $user_list = new Users();
            $user_list->user_list($order);
        }

        public function user_list($order)  {
            $data = new Model();
            $data = $data->user_list_fetch($order);
//            if ($data) {
//                $rows = mysqli_num_rows($data);
//                echo "<table><tr><th>Имя</th><th>возраст</th></tr>";
//                for ($i = 0; $i < $rows; ++$i) {
//                    $row = mysqli_fetch_row($data);
//                    echo "<tr>";
//                    for ($j = 2; $j < 5; ++$j)
//                        switch ($j) {
//                            case 3:
//                                echo "<td>$row[$j]</td>";
//                                break;
//                            case 4:
//                                echo "<td>$row[$j]</td>";
//                                if ($row[$j] < 18){
//                                    echo "<td>Несовершеннолетний</td>";
//                                } else {
//                                    echo "<td>Совершеннолетний</td>";
//                                }
//                                break;
//                        }
//                }
//                echo "</table>";
//            }
            if ($data) {
                $rows = mysqli_num_rows($data);
                echo "<table class=\"table table-bordered\"><tr><th>Пользователь(логин)</th><th>Имя</th><th>возраст</th><th>описание</th><th>Фотография</th><th>Действия</th></tr>";
                for ($i = 0 ; $i < $rows ; ++$i) {
                    $row = mysqli_fetch_row($data);
                    echo "<tr>";
                    for ($j = 1 ; $j < 8 ; ++$j)
                        switch ($j) {
                            case 1:
                            case 3:
                            case 4:
                            case 5:
                                echo "<td>$row[$j]</td>";
                                break;
                            case 6:
                                if ($row[6] == '') {
                                    echo '<td></td>';
                                } else {
                                    echo '<td>' . '<img height="100px" width="100px" src="' . $row[$j] . '">' . '</td>';
                                }
                                break;
                            case 7:
                                echo '<td><form name="avatar" action="files" method="post">
                                       <button type="submit" name="user" value='. $row[1] . '>Изменить аватар</button>
                                  </form><br>
                              </td>';
                                break;
                        }
                }
                echo "</table>";
            }
            echo '<br><a href=\'../../\'>Вернуться</a> ';
        }

        public function upload($user) {
            $file_info = getimagesize($_FILES['avatar']['tmp_name']);
            if ($file_info === FALSE) {
                die("Неверный тип файла");
            }

            if (($file_info[2] !== IMAGETYPE_GIF) && ($file_info[2] !== IMAGETYPE_JPEG) && ($file_info[2] !== IMAGETYPE_PNG)) {
                die("Тип файла не gif/jpeg/png");
            }
            $upload = $_FILES['avatar'];
            $upload_dir = __DIR__.'/../uploads/';
            $upload_url = '/uploads/' . $upload['name'];
            $upload_file = $upload_dir . basename($_FILES['avatar']['name']);
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_file)) {
                echo '<br>';
                echo "Файл успешно загружен.\n";
            } else {
                exit("Ошибка загрузки файла!\n");
            }
            $data = new Model();
            $data->file_upload_fetch($user, $upload_url);
        }

        public function admin_new_user() {
            if (isset($_POST['new_user_login'])) { $login = $_POST['new_user_login'];
                if ($login == '') { unset($login);} }
            if (isset($_POST['new_user_password'])) { $password=$_POST['new_user_password'];
                if ($password =='') { unset($password);} }
            if (isset($_POST['new_user_name'])) { $new_user_name=$_POST['new_user_name'];
                if ($new_user_name =='') { unset($new_user_name);} }
            if (isset($_POST['new_user_age'])) { $new_user_age=$_POST['new_user_age'];
                if ($new_user_age =='') { unset($new_user_age);} }
            if (isset($_POST['new_user_info'])) { $new_user_info=$_POST['new_user_info'];
                if ($new_user_info =='') { unset($new_user_info);} }

            $login = stripslashes($login);
            $login = htmlspecialchars($login);
            $password = stripslashes($password);
            $password = htmlspecialchars($password);
            $new_user_name = stripslashes($new_user_name);
            $new_user_age = stripslashes($new_user_age);
            $new_user_info = stripslashes($new_user_info);
            $new_user_name = htmlspecialchars($new_user_name);
            $new_user_age = htmlspecialchars($new_user_age);
            $new_user_info = htmlspecialchars($new_user_info);
            $login = trim($login);
            $password = trim($password);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user_data = [
                'login' => $login,
                'password' => $password,
                'name' => $new_user_name,
                'age' => $new_user_age,
                'info' => $new_user_info
            ];
            $reg = new Model();
            $reg->admin_new_user_fetch($user_data);
        }

        public function new_user() {
            if (isset($_POST['login'])) { $login = $_POST['login'];
                if ($login == '') { unset($login);} }
            if (isset($_POST['password'])) { $password=$_POST['password'];
                if ($password =='') { unset($password);} }
            if (isset($_POST['password_check'])) { $password_check=$_POST['password_check'];
                if ($password_check =='') { unset($password_check);} }
            if (empty($login) or empty($password))
            {
                exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
            } else { if ($password != $password_check) {
                exit ("Вы неверно повторили пароль!");
            }}
            $login = stripslashes($login);
            $login = htmlspecialchars($login);
            $password = stripslashes($password);
            $password = htmlspecialchars($password);
            $login = trim($login);
            $password = trim($password);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $new_user = new Model();
            $new_user->new_user_fetch($login, $password);
        }

        public function authentication_check() {
            session_start();
            if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
            if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
            if (empty($login) or empty($password))
            {
                exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
            }
            $login = stripslashes($login);
            $login = htmlspecialchars($login);
            $password = stripslashes($password);
            $password = htmlspecialchars($password);
            $login = trim($login);
            $password = trim($password);
            $verify = new Model();
            $id = $verify->verify($login, $password);
            if (isset($id)) {
                $_SESSION['login']=$login;
                $_SESSION['id']=$id;
            } else {
                exit('Вы ввели неверные данные');
            }
        }
    }