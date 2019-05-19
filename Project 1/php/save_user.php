<?php
    if (isset($_POST['name'])) { $name = $_POST['name'];
    if ($name == '') { unset($name);} }
    if (isset($_POST['phone'])) { $phone=$_POST['phone'];
    if ($phone =='') { unset($phone);} }
    if (isset($_POST['email'])) { $email=$_POST['email'];
    if ($email =='') { unset($email);} }
    if (isset($_POST['street'])) { $street=$_POST['street'];
    if ($street =='') { unset($street);} }
    if (isset($_POST['home'])) { $home=$_POST['home'];
    if ($home =='') { unset($home);} }
    if (isset($_POST['part'])) { $part=$_POST['part'];}
    if (isset($_POST['appt'])) { $appt=$_POST['appt'];}
    if (isset($_POST['floor'])) { $floor=$_POST['floor'];}
    if (isset($_POST['comment'])) { $comment=$_POST['comment'];}
    if (empty($name) or empty($phone) or empty($email) or empty($street) or empty($home))
    {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $phone = stripslashes($phone);
    $phone = htmlspecialchars($phone);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $name = trim($name);
    $phone = trim($phone);
    $email = trim($email);
    $address = 'Ул. ' . $street . ', дом ' . $home . ', корпус ' . $part . ', квартира ' . $appt . ', этаж ' . $floor . '.';
    $address = stripslashes($address);
    $address = htmlspecialchars($address);
    $comment = stripslashes($comment);
    $comment = htmlspecialchars($comment);
    include ("db.php");
    $check_email = mysqli_query( $db, "SELECT id FROM burger_users WHERE email='$email'");
    $my_row = mysqli_fetch_array($check_email);
    $order_num = mysqli_query( $db, "SELECT order_count FROM burger_users WHERE email='$email'");
    $order_row = mysqli_fetch_array($order_num);
    if (empty($my_row['id'])) {
        $new_user = mysqli_query($db,"INSERT INTO burger_users (email,name,phone) VALUES('$email','$name','$phone')");
    } else {
        $update_user = mysqli_query($db, "UPDATE burger_users SET name='$name', phone='$phone' WHERE email='$email'");
    }
    $user_id = $my_row['id'];
    $new_order = mysqli_query($db, "INSERT INTO burger_orders (user_id,address,info) VALUES('$user_id','$address','$comment')");

    $order_count = mysqli_query( $db, "SELECT order_count FROM burger_users WHERE email='$email'");
    $global_count = mysqli_query( $db, "SELECT id FROM burger_orders ORDER BY id DESC");
    $count_row = mysqli_fetch_array($order_count);
    $global_row = mysqli_fetch_array($global_count);
    $count_row = $count_row['order_count'];
    $global_row = $global_row['id'];

    if ($count_row !=='0') {
        $count_row += 1;
        $order_count_text = 'Спасибо! Это ваш ' . $count_row . ' заказ.';

    } else {
        $count_row += 1;
        $order_count_text = 'Спасибо за ваш первый заказ!';
    }

    $count_row_update = mysqli_query($db, "UPDATE burger_users SET order_count='$count_row' WHERE email='$email'");

    $file = '../mail/mail.txt';
    $mail_content = 'Заказ №' . $global_row . "\r\n" . 'Ваш заказ будет доставлен по адресу: ' . $address . "\r\n" . 'Ваш заказ - DarkBeefBurger за 500 рублей, 1 шт.' . "\r\n" . $order_count_text;
    file_put_contents($file, $mail_content);

    echo 'Ваш заказ принят! <a href="../index.html">Вернуться на главную страницу</a>';
