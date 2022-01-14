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
<form name="loginin" action="form_r.php" method="post" enctype="multipart/form-data">
    <h1>ФОРМА АВТОРИЗАЦИИ</h1>
    <label>Введите логин: <input type="text" name="login" required</label><br>
    <label>Введите пароль: <input type="text" name="password" required</label><br>
    <input type="submit" name="loginin" value="Авторизация">
    <span><?php echo isset($_COOKIE['login_failed']) ? $_COOKIE['login_failed'] : ''?></span>
</form>
</body>
</html>