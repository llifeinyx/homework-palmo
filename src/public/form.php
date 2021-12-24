<?php
if (isset($_POST)){
    print("Имя: " . $_POST['name']);
    print("<br>Email: " . $_POST['email'] . "<br>");
    //var_dump($_POST);
}
if (isset($_FILES['avatar'])){
    $file = $_FILES['avatar'];
    print("Загружен файл с именем " .$file['name'] . " и размером " . $file['size'] . " байт");
}
$current_path = $_FILES['avatar']['tmp_name'];

$filename = $_FILES['avatar']['name'];
$new_path = dirname(__FILE__) . '/uploads/' . $filename;
$file_path = 'uploads/' . $filename;

move_uploaded_file($current_path, $new_path);
?>

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
<p>Ваша ава:<br></p>
<img src="<?php echo $file_path?>" alt="">
</body>
</html>
