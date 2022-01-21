<?php
//Обрабатываем новость
if (isset($_POST)){
    if (!isset($_COOKIE['news-array'])){
        $news_array = [];
        setcookie('news-array',json_encode($news_array));
    }
    $trueValidation = true;

    $name = htmlspecialchars(trim($_POST['name']));
    $newsDescription = htmlspecialchars(trim($_POST['news-description']));
    $newsDate = $_POST['news-date'];
    if (isset($_POST['news-status'])){
        $newsStatus = $_POST['news-status'];
    } else {
        $trueValidation = false;
    }
    $newsText = htmlspecialchars(trim($_POST['news-text']));
    $newsAuthor = htmlspecialchars(trim($_POST['news-author']));
    $newsFilePath = $_FILES['news-file']['tmp_name'];
    $tempFileName = $_FILES['news-file']['name'];
    $fileType = new SplFileInfo($tempFileName);
    //var_dump($newsFilePath);
    if (!$name){
        $trueValidation = false;

    }
    if (!$newsDescription || strlen($newsDescription) < 20){
        $trueValidation = false;

    }
    if (!$newsDate){
        $mon = '0';
        if (getdate()['mon'] < 10){
            $mon = $mon . getdate()['mon'];
        } else {
            $mon = getdate()['mon'];
        }
        $day = '0';
        if (getdate()['mday'] < 10){
            $day = $day . getdate()['mday'];
        } else {
            $day = getdate()['mday'];
        }
        $dateStr = getdate()['year'] . '-' . $mon . '-' . $day;
        $newsDate = $dateStr;
    }
    if (!$newsText || strlen($newsText) < 100){
        $trueValidation = false;
    }
    if (!$newsAuthor){
        $trueValidation = false;
    }
    if (!$newsFilePath || $fileType->getExtension() !== 'jpg'){
        $trueValidation = false;
    }
    if ($trueValidation === false){
        setcookie('error', 'Ошибки при заполнении формы');
        header('Location:addNews.php');
    } else {
        $filename = $_FILES['news-file']['name'];
        $current_path = $_FILES['news-file']['tmp_name'];
        $new_path = dirname(__FILE__) . '/upload/' . $filename;
        $file_path = 'upload/' . $filename;
        move_uploaded_file($current_path, $new_path);
        $cookieNameTmp = time();
        $newsArray = ['name' => $name, 'news-description' => $newsDescription, 'news-date' => $newsDate,
            'news-text' =>$newsText, 'news-filepath' => $file_path, 'news-author' => $newsAuthor, 'id' => $cookieNameTmp];
        setcookie('error', '', time() - 3600, '/');
        $newsString = json_encode($newsArray);
        $thisCookieObj = json_decode($_COOKIE['news-array'], true);
        array_push($thisCookieObj, $newsArray);
        setcookie('news-array', json_encode($thisCookieObj));
        header('Location:index.php');
    }
}
