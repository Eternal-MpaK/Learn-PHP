<?php
    include ("./php/db.php");
    ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
</head>
<body>
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