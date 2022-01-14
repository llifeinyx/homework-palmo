<?php
session_start();
if (isset($_SESSION['exist'])){
    if ($_SESSION['exist'] === true){
        echo "<a href='home.php'><button>Войти</button></a><br>";
    }
}
?>
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
<h1>РЕГИСТРАЦИЯ/АВТОРИЗАЦИЯ</h1>
<a href="registration.php"><button>Зарегестрироваться</button></a>
<a href="loginin.php"><button>Авторизироваться</button></a>
</body>

</html>