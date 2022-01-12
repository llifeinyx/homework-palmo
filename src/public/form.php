<?php
session_start();
$userArr = [];;


if (isset($_POST)){
    $userArr = json_decode($_SESSION['userData']);
    //var_dump($userArr);
    //echo $userArr->username . "<br>";
    if ($userArr->username === $_POST['username'] &&
        $userArr->password === $_POST['password']
    ){
        //setcookie('userTemp' ,$_SESSION['userData']);
        header('Location: http://example.palmo/home.php');
    } else {
        $userTempArr = ['username' => $_POST['username'], 'password' => $_POST['password']];
        setcookie('userTemp' ,json_encode($userTempArr));
        header('Location: http://example.palmo/index.php');
    }
    //var_dump($_POST);
}
?>