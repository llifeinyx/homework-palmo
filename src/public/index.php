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
<form  class="first-form" name="feedback" method="POST" action="form.php" enctype="multipart/form-data">
    <h1>ФОРМА ДЛЯ ПЕРВОГО ЗАДАНИЯ</h1>
    <label>
        В каком городе вы проживаете?
        <input required type="text" name="enterCity">
    </label>
    <label>
        Сколько вам лет?
        <div>
            <p>
                <input required type="radio" name="radioAge" value="20<">
                <span>20<</span>
            </p>
            <p>
                <input type="radio" name="radioAge" value="20-25">
                <span>20 - 25</span>
            </p>
            <p>
                <input type="radio" name="radioAge" value="26-30">
                <span>26 - 30</span>
            </p>
            <p>
                <input type="radio" name="radioAge" value=">30">
                <span>>30</span>
            </p>
        </div>
    </label>
    <input type="submit" name="send1Form" value="Отправить форму">
</form>
<form id="itemForm" class="first-form" name="itemCreate" method="POST" action="form.php" enctype="multipart/form-data">
    <h1>ФОРМА ДЛЯ ВТОРОГО ЗАДАНИЯ</h1>
    <label>
        Название товара:
        <input required type="text" name="enterItemName">
    </label>
    <label>
        Производитель товара:
        <input required type="text" name="enterItemCreator">
    </label>
    <label>
        Краткое описание:
        <textarea required name="commentAboutItem" form="itemForm" maxlength="50">

        </textarea>
    </label>
    <label>
        Отправьте фотографию:
        <input required type="file" name="imageItem" accept=".jpg, .jpeg, .png">
    </label>
    <input type="submit" name="send2Form" value="Отправить форму">
</form>
<form id="testForm" class="first-form" name="test" method="POST" action="form.php" enctype="multipart/form-data">
    <h1>ФОРМА ДЛЯ ТРЕТЬЕГО ЗАДАНИЯ</h1>
    <p>ВНИМАНИЕ! ТЕСТ!</p>
    <label>
        Фамилия президента РФ:
        <input type="text" name="test1">
    </label>
    <label>
        В каком году русь крестили:
        <input type="radio" name="test2" value="988">
        <span>988</span>
        <input type="radio" name="test2" value="989">
        <span>989</span>
        <input type="radio" name="test2" value="999">
        <span>999</span>
    </label>
    <label>
        Какие утверждения равны true:
        <input type="checkbox" name="test3WrongAnswer1">
        <span>true && false</span>
        <input type="checkbox" name="test3RightAnswer1">
        <span>false || true</span>
        <input type="checkbox" name="test3RightAnswer2">
        <span>true && true</span>
        <input type="checkbox" name="test3WrongAnswer2">
        <span>false && false</span>
    </label>
    <p>ФИНАЛЬНЫЙ ВОПРОС! НАЖАТИЕ НА ОДНУ ИЗ КАРТИНОК ОТПРАВИТ ФОРМУ!</p>
    <label class="super-class">
        Какой ЯП убогей?:
        <input type="image" form="testForm" src="img/php.svg" alt="php" width="150" height="150" name="php">
        <input type="image" form="testForm" src="img/html.png" alt="html" width="150" height="150" name="html">
    </label>
</form>

<?php
//
//
//    /* EX ON LESSON */
//
//
//    //ex 1
//    function numIn($num, $pow){
//        return intval($num) ** intval($pow);
//    }
//    echo numIn(3, 9), "<br>";
//    //ex 2
//    function numToWeek($num){
//        $weekDay = ['пон', 'вт','ср' ,'чт','пт','сб','вс'];
//        if ((int)$num < 0 || (int)$num > 7){
//            return 'Некорректный ввод';
//        }
//        return $weekDay[$num];
//    }
//    echo numToWeek(4), "<br>";
//    //ex 3
//    function slug($str){
//        return str_replace(' ', '-', mb_strtolower(trim($str)));
//    }
//    echo slug('Hello palmo'), "<br>";
//    //ex 4
//    $products = [
//        ['name' => 'Телевизор', 'prise' => '400', 'quantity' => 1],
//        ['name' => 'Телефон', 'prise' => '300', 'quantity' => 3],
//        ['name' => 'Кроссовки', 'prise' => '150', 'quantity' => 2]
//    ];
//    function sumAndCount($arr)
//    {
//        $fullPrice = 0;
//        $fullQuantity = 0;
//        foreach ($arr as $i) {
//            $fullPrice += intval($i['prise']);
//            $fullQuantity += intval($i['quantity']);
//        }
//        //echo $fullPrice, ' ', $fullQuantity, "<br>";
//        return [$fullPrice, $fullQuantity];
//    }
//    echo sumAndCount($products)[0], ' ', sumAndCount($products)[1] , "<br>";
//
//

 /* EX HOMEWORK */
//ex 1

?>
</body>

</html>