<?php
if(isset($_POST) && isset($_POST['send_file'])){
    $file_path = $_FILES['file']['tmp_name'];
    foreach(file($file_path) as $str){
        echo "<pre>" . htmlspecialchars($str) . "</pre>";
    }
}
if (isset($_POST) && isset($_POST['registration'])){
    $file_name = 'users.txt';
    $file_pointer = fopen($file_name, 'w+');
    chmod($file_name, 0777);
    fwrite($file_pointer, htmlspecialchars(trim($_POST['login'])) . PHP_EOL);
    fclose($file_pointer);
    header('Location: index.php');
}