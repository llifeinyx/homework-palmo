<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Palmo Helloe world</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="manifest" href="site.webmanifest">
    <meta name="theme-color" content="#fafafa">
</head>

<body style="margin: 0;">
    <div>
        <a href="authorization.php">Авторизироваться</a>
    </div>
    <div>
        <a href="registration.php">Зарегестрироваться</a>
    </div>
    <div><?php echo $_COOKIE['success-registration'] ?? "";?></div>
</body>

</html>