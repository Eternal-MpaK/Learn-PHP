<?php
include ("db.php");
$file = $_POST['file'];
$myphoto = mysqli_query( $db, "SELECT photo FROM users WHERE photo='$file'");
$photo = mysqli_fetch_array($myphoto);
$delete = "./photos/$photo[0]";
unlink($delete);
$deleted = mysqli_query($db, "UPDATE users SET photo='' WHERE photo='$file'") or die("Ошибка " . mysqli_error($db));
echo 'Файл удален. <br><a href="../filelist.php">Вернуться на страницу списка файлов.</a>';

