<?php
session_start();

include "classes/registrationClass.php";

use RegistrationClass\RegistrationValidation as RegistrationValidation;
if (isset($_POST)){
    $userRegistrationValidation = new RegistrationValidation($_POST, $_FILES);
    $userRegistrationValidation->validationProcess();
    if ($userRegistrationValidation->userData !== false){
        $tmpUserData = $userRegistrationValidation->userData;
        $tmpUserData['validation'] = false;
        if (!isset($_SESSION['users'])){
            $_SESSION['users'] = [];
        }
        array_push($_SESSION['users'], $tmpUserData);
    }
    setcookie('success-registration', 'Вы успешно прошли регистрацию', time() + 1);
    header("Location: index.php");
}