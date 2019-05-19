<h1>Админская панель</h1><br>
<h2>Создать нового пользователя</h2><br>
<form id="form" action="admin" enctype="multipart/form-data" method="post">
    <div>Логин пользователя<br><input type="text" name="new_user_login"></div><br>
    <div>Пароль пользователя<br><input type="text" name="new_user_password"></div><br>
    <div>Имя пользователя<br><input type="text" name="new_user_name"></div><br>
    <div>Возраст пользователя<br><input type="number" name="new_user_age"></div><br>
    <div>Описание пользователя<br><textarea name="new_user_info"></textarea></div><br>
    <div><input type="submit" name="submit" value="Создать"></div>
</form>
<br><a href='../../'>Вернуться</a>