<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form name="registration" action="form_r.php" method="post" enctype="multipart/form-data">
    <h1>ФОРМА РЕГИСТРАЦИИ</h1>
    <label>Введите имя пользователя: <input type="text" name="name" required
                                            value="<?php if(isset($_COOKIE['name'])){echo $_COOKIE['name'];} ?>">
    <span><?php echo isset($_COOKIE['name_error']) ? $_COOKIE['name_error'] : "";?></span>
    </label><br>
    <label>Введите номер телефона: <input type="tel" name="tel" required
                                          value="<?php if(isset($_COOKIE['tel'])){echo $_COOKIE['tel'];} ?>">
    <span><?php echo isset($_COOKIE['tel_error']) ? $_COOKIE['tel_error'] : "";?></span>
    </label><br>
    <label>Введите логин: <input type="text" name="login" required
        value="<?php if(isset($_COOKIE['login'])){echo $_COOKIE['login'];} ?>"></label><br>
    <label>Введите пароль: <input type="text" name="password" required>
        <span><?php echo isset($_COOKIE['password_error']) ? $_COOKIE['password_error'] : "";?></span>
    </label><br>
    <label>Подтвердите пароль: <input type="text" name="r_password" required>
        <span><?php echo isset($_COOKIE['r_password_error']) ? $_COOKIE['r_password_error'] : "";?></span>
    </label><br>
    <input type="submit" name="registration" value="Регистрация">
</form>
</body>
</html>
