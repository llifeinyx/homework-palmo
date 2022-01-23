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
<form action="regForm.php" enctype="multipart/form-data" method="post">
    <h1>ФОРМА ДЛЯ РЕГИСТРАЦИИ</h1>
    <div>
        <label for="login">Введите ваш логин (минимум 5 символов):</label>
        <input type="text" id="login" name="login">
    </div>
    <div>
        <label for="email">Введите email:</label>
        <input type="text" id="email" name="email">
    </div>
    <div>
        <label for="password">Введите пароль (минимум одна заглавная буква и число):</label>
        <input type="text" id="password" name="password">
    </div>
    <div>
        <label for="confirm-password">Повторите пароль:</label>
        <input type="text" id="confirm-password" name="confirm-password">
    </div>
    <div>
        <label for="avatar">Загрузите аватар:</label>
        <input type="file" id="avatar" name="avatar">
    </div>
    <div>
        <input type="submit" value="Зарегистрироваться" name="send-form">
    </div>
    <div><?php echo $_COOKIE['registration-error'] ?? " " ?></div>
</form>
</body>
</html>