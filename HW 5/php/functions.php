<?php
    session_start();
    include ("db.php");
    if (isset($_SESSION['login'])) { $login = $_SESSION['login']; if ($login == '') { unset($login);} }
    $user = $_POST['user'];
    $name = $_POST['name'];
    $name = strip_tags($name);
    $age = $_POST['age'];
    $info = $_POST['info'];
    $info = strip_tags($info);
    $file_info = getimagesize($_FILES['avatar']['tmp_name']);
    if ($file_info === FALSE) {
        die("Неверный тип файла");
    }

    if (($file_info[2] !== IMAGETYPE_GIF) && ($file_info[2] !== IMAGETYPE_JPEG) && ($file_info[2] !== IMAGETYPE_PNG)) {
        die("Тип файла не gif/jpeg/png");
    }
    $avatar = $_FILES['avatar'];
    $upload_dir = './photos/';
    $upload_file = $upload_dir . basename($_FILES['avatar']['name']);
    $my_photo = mysqli_query( $db, "SELECT photo FROM users WHERE login='$user'");
    $photo = mysqli_fetch_array($my_photo);
    $delete = "./photos/$photo[0]";

    if ($photo[0] != '')unlink($delete);
    $result2 = mysqli_query($db,"UPDATE users SET name='$name', age='$age', description='$info', photo='$avatar[name]' WHERE login='$user'");

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_file)) {
        echo "Файл успешно загружен.\n";
        echo '<br>';
    } else {
        echo "Ошибка загрузки файла!\n";
        echo '<br>';
    }

    if ($result2 == true){
        echo 'Информация занесена в базу данных. <br><a href="../list.php">Вернуться на страницу списка участников.</a> ';
        echo '<br>';
    }else{
        echo "Информация не занесена в базу данных";
        echo '<br>';
   }


