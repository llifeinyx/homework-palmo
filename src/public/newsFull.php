<?php
$idPost = array_search('подробнее', $_POST);
$allNewsArray = json_decode($_COOKIE['news-array'], true);
$key = array_search($idPost, array_column($allNewsArray, 'id'));
$newsArray = $allNewsArray[$key];
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
    <div><?php echo $newsArray['name']?></div>
    <div><?php echo $newsArray['news-author'] . "___________________" . $newsArray['news-date']?></div>
    <div><?php echo $newsArray['news-description']?></div>
    <div><?php echo $newsArray['news-text']?></div>
    <?php echo "<img src='{$newsArray['news-filepath']}' alt='itemImage'>";?>
</body>
</html>
