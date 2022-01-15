<?php
//session_start();
//$userData = ["username" => 'Jason', "password" => 'parker'];
//$_SESSION['userData'] = json_encode($userData);
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
<form action="home.php" enctype="multipart/form-data" method="post">
    <h1>ФОРМА ДЛЯ ЗАГРУЗКИ ФАЙЛА</h1>
    <label for="file">Загрузите файл формата txt:</label>
    <input type="file" id="file" name="file" accept=".txt" required>
    <input type="submit" value="отправить" name="send_file">
</form>
<form action="home.php" enctype="multipart/form-data" method="post">
    <h1>ФОРМА ДЛЯ РЕГИСТРАЦИИ</h1>
    <label for="login">Введите логин:</label>
    <input type="text" id="login" name="login" required>
    <label for="password">Введите пароль:</label>
    <input type="text" id="password" name="password" required>
    <input type="submit" value="отправить" name="registration">
</form>
<?php
//FROM PAST LESSON

//$file1 = fopen('text.txt', 'w+');
//fwrite($file1, 'Hello Palmo');
////$txt = fread($file1, filesize('text.txt'));
//$txt = file_get_contents('text.txt');
////var_dump($txt);
//echo $txt . "<br>";
//echo stat('text.txt')['size'] . ' размер в байтах ' . "<br>";
//echo (stat('text.txt')['size']/1000) . ' размер в мегабайтах ' . "<br>";
//echo (stat('text.txt')['size']/10000) . ' размер в гигабайтах ' . "<br>";
//$file2 = fopen('text2.txt', 'w+');
//unlink('text2.txt');
//
//function dirOrFile($dirOrFile){
//    if (is_dir($dirOrFile)){
//        return 'is dir';
//    } elseif(is_file($dirOrFile)) {
//        return "is file";
//    } else {
//        return 'wtf';
//    }
//}
//
//$dirNameArr = ['text1', 'text2', 'text3'];
//if (!file_exists('Test')){
//    mkdir('Test', 0777);
//}
//foreach ($dirNameArr as $name){
//    if (!file_exists('Test/' . $name)){
//        mkdir(('Test/' . $name), 0777);
//    }
//    $fileTmp = fopen('Test/' . $name . '/Hello.txt', 'w+');
//    fwrite($fileTmp, 'Hello Palmo!');
//    echo file_get_contents('Test/' . $name . '/Hello.txt');
//}
//    echo dirOrFile('jjjjjjjjjjj') . "<br>";
//
//    function printFileFromDir($mainDirPath){
//        $sumFile = 0;
//        $scanDir = scandir($mainDirPath);
//        foreach ($scanDir as $dir){
//            if ($dir === '.' || $dir === '..'){
//                continue;
//            }
//            if (is_file($mainDirPath . '/' . $dir)){
//                $sumFile += filesize($mainDirPath . '/' . $dir);
//            } elseif(is_dir($mainDirPath . '/' . $dir)) {
//                $sumFile += printFileFromDir($mainDirPath . '/' . $dir);
//            }
//        }
//        return $sumFile;
//    }
//    function deleteNahoy($mainDirPath){
//        $scanDir = scandir($mainDirPath);
//        foreach ($scanDir as $dir){
//            if ($dir === '.' || $dir === '..'){
//                continue;
//            }
//            if (is_file($mainDirPath . '/' . $dir)){
//                unlink($mainDirPath . '/' . $dir);
//            } elseif(is_dir($mainDirPath . '/' . $dir)) {
//                deleteNahoy($mainDirPath . '/' . $dir);
//                //echo
//                rmdir($mainDirPath . '/' . $dir);
//            }
//        }
//    }
//    echo printFileFromDir('Test');
//    deleteNahoy('Test');

// HOMEWORK

// main data
$file_name = 'fruits.txt';
$fruits_file = fopen($file_name, 'w+');
$fruits_string = 'apple' . PHP_EOL . 'banana' . PHP_EOL . 'cherry' . PHP_EOL . 'tomato' . PHP_EOL . 'cucumber'
    . PHP_EOL . 'orange' . PHP_EOL . 'red' . PHP_EOL . 'chess' . PHP_EOL . 'borsh' . PHP_EOL . 'green';
// init file
//chmod($file_name, 0777);
fwrite($fruits_file, $fruits_string);
// close file
fclose($fruits_file);

//function sort (1 ex)
function sortFile($file_name){
    $file_pointer = fopen($file_name, 'r+');
    $strArray = file($file_name);
    sort($strArray, SORT_STRING);
    foreach ($strArray as $str){
        fwrite($file_pointer, $str);
    }
    fclose($file_pointer);
}
sortFile($file_name);

//function for delete file by rule > 1 mb (last ex)
function deleteFileBySize(int $size, string $dir_path){
    $scan_list = scandir($dir_path);
    foreach ($scan_list as $item){
        if ($item === '.' || $item === '..'){
            continue;
        }
        if (is_file($dir_path . '/' . $item) && filesize($dir_path . '/' . $item) > $size){
            unlink($dir_path . '/' . $item);
        }
        if (is_dir($dir_path . '/' . $item)){
            deleteFileBySize($size, $dir_path . '/' . $item);
        }
    }
}

// 1 mb = 10000 b
deleteFileBySize(10000, 'uploads');
?>
</body>

</html>