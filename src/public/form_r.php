<?php

session_start();

$userTempData = [];

function numInStr($str){
    for ($i = 0; $i < strlen($str); $i++){
        if (is_numeric($str[$i])){
            return true;
        }
    }
    return false;
}

function strTreatment($str){
    return htmlspecialchars(trim($str));
}

if (isset($_POST) && isset($_POST['registration'])){
    $correct_registration = true;
    setcookie('name', strTreatment($_POST['name']));
    if (strlen(strTreatment($_POST['name'])) < 2 ){
        setcookie('name_error', 'некорректный ввод');
        $correct_registration = false;
    } else {
        setcookie('name_error', '', time() - 3600, '/');
    }
    setcookie('tel', strTreatment($_POST['tel']));
    if (!is_numeric(strTreatment($_POST['tel'])) || strlen(strTreatment($_POST['tel'])) !== 10){
        setcookie('tel_error', 'некорректный ввод');
        $correct_registration = false;
    } else {
        setcookie('tel_error', '', time() - 3600, '/');
    }
    setcookie('login', strTreatment($_POST['login']));
    if (strlen(strTreatment($_POST['password'])) < 6){
        setcookie('password_error', 'не меньше 6 символов в пароле');
        $correct_registration = false;
    } else {
        setcookie('password_error', '', time() - 3600, '/');
    }
    if (strTreatment($_POST['r_password']) !== strTreatment($_POST['password'])){
        setcookie('r_password_error', 'неправильно повторили пароль');
        $correct_registration = false;
    } else {
        setcookie('r_password_error', '', time() - 3600, '/');
    }
    if ($correct_registration === false){
        header('Location: http:/registration.php');
    } else {
        setcookie('name', '', time() - 3600, '/');
        setcookie('tel', '', time() - 3600, '/');
        setcookie('login', '', time() - 3600, '/');
        $_SESSION['username'] = $_POST['name'];
        $_SESSION['usertel'] = $_POST['tel'];
        $_SESSION['userlogin'] = $_POST['login'];
        $_SESSION['userpassword'] = $_POST['password'];
        $_SESSION['exist'] = true;
        header('Location: http:/home.php');
    }
}

if (isset($_POST) && isset($_POST['loginin'])){
    if (isset($_SESSION['userlogin'])){
        if ($_POST['login'] === $_SESSION['userlogin'] && $_POST['password'] === $_SESSION['userpassword']){
            setcookie('login_failed', '', time() - 3600, '/');
            $_SESSION['exist'] = true;
            header('Location: http:/home.php');
        } else {
            setcookie('login_failed', 'неправильный логин или пароль');
            header('Location: http:/loginin.php');
        }
    }else {
        setcookie('login_failed', 'неправильный логин или пароль');
        header('Location: http:/loginin.php');
    }
}
if (isset($_POST) && isset($_POST['logout'])) {
    $_SESSION['exist'] = false;
    header('Location: http:/index.php');
}