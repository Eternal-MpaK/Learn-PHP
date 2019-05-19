<?php
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
    include ("db.php");
    $result = mysqli_query( $db, "SELECT id FROM users WHERE login='$login'");
    $my_row = mysqli_fetch_array($result);
    if (!empty($my_row['id'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    $result2 = mysqli_query($db,"INSERT INTO users (login,password) VALUES('$login','$password')");
    if ($result2=='TRUE')
    {
        echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='../index.html'>Главная страница</a>";
    }
    else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
?>