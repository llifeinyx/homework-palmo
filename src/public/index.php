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
<h1>Q1</h1>
<?php
$file1 = fopen('text.txt', 'w+');
fwrite($file1, 'Hello Palmo');
//$txt = fread($file1, filesize('text.txt'));
$txt = file_get_contents('text.txt');
//var_dump($txt);
echo $txt . "<br>";
echo stat('text.txt')['size'] . ' размер в байтах ' . "<br>";
echo (stat('text.txt')['size']/1000) . ' размер в мегабайтах ' . "<br>";
echo (stat('text.txt')['size']/10000) . ' размер в гигабайтах ' . "<br>";
$file2 = fopen('text2.txt', 'w+');
unlink('text2.txt');

function dirOrFile($dirOrFile){
    if (is_dir($dirOrFile)){
        return 'is dir';
    } elseif(is_file($dirOrFile)) {
        return "is file";
    } else {
        return 'wtf';
    }
}

$dirNameArr = ['text1', 'text2', 'text3'];
if (!file_exists('Test')){
    mkdir('Test', 0777);
}
foreach ($dirNameArr as $name){
    if (!file_exists('Test/' . $name)){
        mkdir(('Test/' . $name), 0777);
    }
    $fileTmp = fopen('Test/' . $name . '/Hello.txt', 'w+');
    fwrite($fileTmp, 'Hello Palmo!');
    echo file_get_contents('Test/' . $name . '/Hello.txt');
}
    echo dirOrFile('jjjjjjjjjjj') . "<br>";

    function printFileFromDir($mainDirPath){
        $sumFile = 0;
        $scanDir = scandir($mainDirPath);
        foreach ($scanDir as $dir){
            if ($dir === '.' || $dir === '..'){
                continue;
            }
            if (is_file($mainDirPath . '/' . $dir)){
                $sumFile += filesize($mainDirPath . '/' . $dir);
            } elseif(is_dir($mainDirPath . '/' . $dir)) {
                $sumFile += printFileFromDir($mainDirPath . '/' . $dir);
            }
        }
        return $sumFile;
    }
    function deleteNahoy($mainDirPath){
        $scanDir = scandir($mainDirPath);
        foreach ($scanDir as $dir){
            if ($dir === '.' || $dir === '..'){
                continue;
            }
            if (is_file($mainDirPath . '/' . $dir)){
                unlink($mainDirPath . '/' . $dir);
            } elseif(is_dir($mainDirPath . '/' . $dir)) {
                deleteNahoy($mainDirPath . '/' . $dir);
                //echo
                rmdir($mainDirPath . '/' . $dir);
            }
        }
    }
    echo printFileFromDir('Test');
    deleteNahoy('Test');
?>
</body>

</html>