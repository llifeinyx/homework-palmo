<?php
session_start();
$userData = ["username" => 'Jason', "password" => 'parker'];
$_SESSION['userData'] = json_encode($userData);
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
<form  class="first-form" name="feedback" method="POST" action="form.php" enctype="multipart/form-data">
    <h1>ФОРМА</h1>
    <label>
        Введите логин:
        <input type="text" name="username" value="<?php
        if (isset($_COOKIE['userTemp'])){
            echo json_decode($_COOKIE['userTemp'])->username;
        } else {
            echo "";
        }
        ?>">
    </label>
    <label>
        Введите пароль:
        <input type="text" name="password" value="<?php
        if (isset($_COOKIE['userTemp'])){
            echo json_decode($_COOKIE['userTemp'])->password;
        } else {
            echo "";
        }
        ?>">
    </label>
    <input type="submit" name="send1Form" value="Отправить форму">
</form>
</body>

</html>