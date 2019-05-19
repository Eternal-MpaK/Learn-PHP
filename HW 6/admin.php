<?php
    include ("./php/db.php");
    include('./php/SimpleImage.php');

    ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
</head>
<body>
    <?php
    $img = "img\Computer.jpg";
    $new_img = "img\Rotated_Computer.jpg";
    $stamp = imagecreatefromjpeg('img\Znak-kachestva.jpg');
    $marge_right = 10;
    $marge_bottom = 10;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    $img_comp = imagecreatefromjpeg($img);
    $degrees = 45;
    $imgRotated = imagerotate($img_comp, $degrees, imageColorAllocateAlpha($img_comp, 255, 255, 255, 127));
    imagecopy($imgRotated, $stamp, imagesx($imgRotated) - $sx - $marge_right, imagesy($imgRotated) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
    imagejpeg($imgRotated, $new_img, 100);
    $image = new SimpleImage();
    $image->load('img\Rotated_Computer.jpg');
    $image->resizeToWidth(200);
    $image->save('img\Rotated_Computer2.jpg');
    ?>
    <img src="img\Rotated_Computer2.jpg">
    <h1>Список клиентов</h1>
    <?php
        $data = mysqli_query($db, "SELECT * FROM burger_users");

        if ($data) {
            $rows = mysqli_num_rows($data);
            echo "<table style='text-align: center; border: 3px solid black; border-collapse: collapse'><tr><th>Идентификатор</th><th>Почта</th><th>Имя</th><th>Телефон</th><th>Количество заказов</th></tr>";
            for ($i = 0 ; $i < $rows ; ++$i) {
                $row = mysqli_fetch_row($data);
                echo "<tr>";
                    for ($j = 0 ; $j < 5 ; ++$j) {
                        echo "<td style='padding: 5px; border: 2px solid darkgray'>$row[$j]</td>";
                    }
                }
            echo "</table>";
            }

    ?>
    <h1>Список заказов</h1>
    <?php
    $data = mysqli_query($db, "SELECT * FROM burger_orders");

    if ($data) {
        $rows = mysqli_num_rows($data);
        echo "<table style='text-align: center; border: 3px solid black; border-collapse: collapse'><tr><th>Номер заказа</th><th>ИД пользователя</th><th>Адрес заказа</th><th>Комментарий</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i) {
            $row = mysqli_fetch_row($data);
            echo "<tr>";
            for ($j = 0 ; $j < 4 ; ++$j) {
                echo "<td style='padding: 5px; border: 2px solid darkgray'>$row[$j]</td>";
            }
        }
        echo "</table>";
    }

    ?>
</body>