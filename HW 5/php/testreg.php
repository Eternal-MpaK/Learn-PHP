<?php
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
include ("db.php");
$result = mysqli_query($db,"SELECT * FROM users WHERE login='$login'");
$my_row = mysqli_fetch_array($result);
if (empty($my_row['password']))
{
    exit ("Извините, введённый вами login или пароль неверный.");
}
else {
    if (password_verify($password, $my_row['password'])) {
        $_SESSION['login']=$my_row['login'];
        $_SESSION['id']=$my_row['id'];
        echo "Вы успешно вошли на сайт! <a href='../list.php'>Главная страница</a>";
    } else {
        exit ("Извините, введённый вами login или пароль неверный.");
    }
}
?>
