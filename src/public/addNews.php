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
<form name="news" action="formNews.php" enctype="multipart/form-data" method="post">
    <div>
        <label for="name">Введите название новости:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="news-description">Введите краткое описание новости (не меньше 20 символов):</label>
        <textarea name="news-description" id="news-description" cols="30" rows="10">
            1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890
        </textarea>
    </div>
    <div>
        <label for="news-date">Введите дату новости:</label>
        <input type="date" name="news-date" id="news-date">
    </div>
    <div>
        <label for="news-status"> Выберете статус новости:</label>
        <input id="news-status" type="radio" name="news-status" value="blacklist">
        <span>Черновик</span>
        <input id="news-status" type="radio" name="news-status" value="whitelist">
        <span>Опубликовано</span>
    </div>
    <div>
        <label for="news-text">Введите новость (не меньше 100 символов):</label>
        <textarea name="news-text" id="news-text" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="news-author">Введите свой псевдоним:</label>
        <input type="text" name="news-author" id="news-author">
    </div>
    <div>
        <label for="news-file">Загрузите заглавную картинку (формат только jpg):</label>
        <input type="file" name="news-file" id="news-file">
    </div>
    <div>
        <input type="submit" name="news-submit">
    </div>
    <?php
    if (isset($_COOKIE['error'])){
     echo "<strong>" . $_COOKIE['error'] . "</strong>";
    }
    ?>
</form>
</body>
</html>
