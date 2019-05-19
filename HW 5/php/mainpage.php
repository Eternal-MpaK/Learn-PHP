<?php
    session_start();
    include ("db.php");
    $user = $_POST['user'];
    echo 'Изменение личных данных пользователя  ' . $user . '<br>' . '<br>';
?>

<html>
<head>
    <title>Личные данные</title>
</head>
<body>
    <form id="main_form" action="functions.php" enctype="multipart/form-data" method="post">
        <div>Ваше имя<br><input type="text" name="name"></div><br>
        <div>Ваш возраст<br><input type="number" name="age"></div><br>
        <div>Описание<br><textarea name="info"></textarea></div><br>
        <div>Ваша аватарка<br><input type="file" name="avatar"></div><br>
        <?php
            echo '<div><input name="user" type="hidden" value="' . $user . '"></div>'
        ?>
        <div><input type="submit" name="submit" value="Ввести данные"></div>
    </form>
</body>
</html>



<?php
