<?php
session_start();

include "classes/authorizationClass.php";

use AuthorizationClass\AuthorizationValidation as AuthorizationValidation;
if (isset($_POST)){
    $userAuthorizationValidation = new AuthorizationValidation($_POST, $_SESSION);
    $userAuthorizationValidation->validationProcess();
    if ($userAuthorizationValidation->validation === true){
        $_SESSION['users'][$userAuthorizationValidation->userKey]['validation'] = $userAuthorizationValidation->rememberCheck;
        header("Location: home.php");
    }
}