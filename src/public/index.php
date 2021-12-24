<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Palmo Helloe world</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <meta name="theme-color" content="#fafafa">
</head>

<body style="margin: 0;">
<form name="feedback" method="POST" action="form.php" enctype="multipart/form-data">
    <label>Ваше имя: <input type="text" name="name"></label>
    <label>Ваш email: <input type="text" name="email"></label>
    <label>Аватарка: <input type="file" name="avatar"></label>
    <input type="submit" name="send" value="Отправить">
</form>
<?php
    //ex 1
    function numIn($num, $pow){
        return intval($num) ** intval($pow);
    }
    echo numIn(3, 9), "<br>";
    //ex 2
    function numToWeek($num){
        $weekDay = ['пон', 'вт','ср' ,'чт','пт','сб','вс'];
        if ((int)$num < 0 || (int)$num > 7){
            return 'Некорректный ввод';
        }
        return $weekDay[$num];
    }
    echo numToWeek(4), "<br>";
    //ex 3
    function slug($str){
        return str_replace(' ', '-', mb_strtolower(trim($str)));
    }
    echo slug('Hello palmo'), "<br>";
    //ex 4
    $products = [
        ['name' => 'Телевизор', 'prise' => '400', 'quantity' => 1],
        ['name' => 'Телефон', 'prise' => '300', 'quantity' => 3],
        ['name' => 'Кроссовки', 'prise' => '150', 'quantity' => 2]
    ];
    function sumAndCount($arr)
    {
        $fullPrice = 0;
        $fullQuantity = 0;
        foreach ($arr as $i) {
            $fullPrice += intval($i['prise']);
            $fullQuantity += intval($i['quantity']);
        }
        //echo $fullPrice, ' ', $fullQuantity, "<br>";
        return [$fullPrice, $fullQuantity];
    }
    echo sumAndCount($products)[0], ' ', sumAndCount($products)[1] , "<br>";
?>
</body>

</html>