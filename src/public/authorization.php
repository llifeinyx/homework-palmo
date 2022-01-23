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
<form action="authForm.php" enctype="multipart/form-data" method="post">
    <h1>ФОРМА ДЛЯ АВТОРИЗАЦИИ</h1>
    <div>
        <label for="login">Введите ваш логин:</label>
        <input type="text" id="login" name="login">
    </div>
    <div>
        <label for="password">Введите пароль:</label>
        <input type="text" id="password" name="password">
    </div>
    <div>
        <span>Запомнить меня</span>
        <input type="checkbox" value="true" name="remember-me">
    </div>
    <div>
        <input type="submit" value="Войти" name="send-form">
    </div>
    <div><?php echo $_COOKIE['authorization-error'] ?? " " ?></div>
</form>
</body>
</html>