<?php
include ("db.php");
$user = $_POST['user'];
$myphoto = mysqli_query( $db, "SELECT photo FROM users WHERE login='$user'");
$photo = mysqli_fetch_array($myphoto);
$delete = "./photos/$photo[0]";
unlink($delete);
$deleted = mysqli_query($db, "DELETE FROM users WHERE login = '$user'") or die("Ошибка " . mysqli_error($db));
echo 'Пользователь удален. <br><a href="../list.php">Вернуться на страницу списка участников.</a>';

