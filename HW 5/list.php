<?php
    session_start();
    include ("./php/db.php");
    if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
        exit ("Вы не авторизированны!");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Список пользователей</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Задание №5</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Авторизация</a></li>
            <li><a href="reg.html">Регистрация</a></li>
            <li class="active"><a href="list.php">Список пользователей</a></li>
            <li><a href="filelist.php">Список файлов</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
<?php
    $data = mysqli_query($db, "SELECT * FROM users");

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
                            echo '<td>' . '<img height="100px" width="100px" src="./php/photos/' . $row[$j] . '">' . '</td>';
                        }
                        break;
                    case 7:
                        echo '<td><form name="change_data" action="./php/mainpage.php" method="post">
                                       <button type="submit" name="user" class="btn btn-default" value='. $row[1] . '>Изменить данные пользователя</button>
                                  </form><br>
                                  <form name="change_data" action="./php/delete_user.php" method="post">
                                       <button type="submit" name="user" class="btn btn-default" value='. $row[1] . '>Удалить пользователя</button>
                                  </form>
                              </td>';
                        break;
                }
        }
        echo "</table>";
    }

?>
    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
