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
<main style="display: flex; justify-content:center; margin-top: 25px;">
    <!--    <img src="palmo.jpg" alt="">-->
</main>
<?php


//..</HOMEWORK 1\>
echo "ПЕРВАЯ ДОМАШКА <br>";

// ex1
$name = 'Jhon';
echo $name, "<br>";
// ex2
$a = 8; $b = 1;
echo $a + $b, ' ', $a - $b, ' ', $a * $b, ' ', $a / $b, "<br>";
// ex3
$number = 5;
$result = $number ** 3;
echo $result, "<br>";
// ex4
$age = 18;
if ($age >= 18 && $age <= 60){
    echo 'Вам еще рабоатть и работать...', "<br>";
}
// ex5
if ($age < 18){
    echo 'Вам еще рано работать', "<br>";
}
if ($age > 60){
    echo 'Пора на пенсию', "<br>";
}
// ex6
$dayNumber = 4;
if ($dayNumber >= 1 && $dayNumber <= 5){
    echo 'Рабочий день', "<br>";
} elseif ($dayNumber >= 6 && $dayNumber <= 7){
    echo 'Отдых, работяги', "<br>";
} else {
    echo 'ошибка', "<br>";
}
// ex7
const DAYS_COUNT = 7;
define('MONTH_COUNT',  12);
echo DAYS_COUNT, ' ', MONTH_COUNT, "<br>";
// ex8
$num1 = 5;
$num2 = 4;
if ($num1 === $num2){
    echo 'Сумма чисел равна: ', $num1 + $num2, "<br>";
} else {
    echo 'Разница чисел равна: ', $num1 - $num2, "<br>";
}
// ex9
$rndNum = rand(1, 100);
if ($rndNum % 5 === 0){
    echo 'Число ', $rndNum, ' кратно 5', "<br>";
} else {
    echo 'Число ', $rndNum, ' не кратно 5', "<br>";
}
echo "<br>";


//..</HOMEWORK 2\>
echo "ВТОРАЯ ДОМАШКА <br>";

// ex1 ->
$str1 = 'bbclol';
if ($str1[0] === 'a' && $str1[1] === 'b' && $str1[2] === 'c'){
    echo substr_replace($str1, 'www', 0, 3);
} else {
    echo $str1 . 'zzz';
}
echo "<br>";
// ex2 ->
$str2 = '1234567';
if (strlen($str2) > 10){
    echo mb_substr($str2, 0, 6);
} else {
    echo str_pad($str2, 12, 'o');
}
echo "<br>";
//ex3 ->
$str3 = '12fdj4dfgjk6';
echo strlen(preg_replace('/[^\d]/','',$str3));
echo "<br>";
//ex4 ->
$str4 = 'word in the world in the word of word lol';
echo str_replace('word', 'letter', $str4);
echo "<br>";
//ex5 ->
$str5 = 'xabclolxnaxabc';
echo str_replace('xabc', 'abc', $str5);
echo "<br>";
//ex6 ->
$str6 = 'abalolbababaldfgababcv';
echo substr_count($str6, 'aba');
echo "<br>";
//ex7 ->
$str7 = 'MATARWAKKA';
$str7 = mb_strtolower($str7);
$str7[0] = mb_strtoupper($str7[0]);
echo $str7;
echo "<br>";
//ex8 ->
$str8 = 'Name Familiya Matronim';
$strArr = explode(' ', $str8);
echo $strArr[0] , ' ', $strArr[1][0], '. ', $strArr[2][0], '.';
echo "<br>";
//ex9 ->
$i9 = 0;
while($i9++ < 10){
    echo $i9,'. ', "A u welcome <br>";
}
//ex10 ->
$sum = 0;
$i10 = 1;
while(true){
    if ($i10 > 112){
        break;
    }
    $sum += $i10;
    $i10 += 3;
}
echo $sum;
echo "<br>";
//ex11 ->
echo 'Результат 11 задания скрыт, так как занимает очень много места' . "<br>";
for ($i = 9999; $i >= 0; $i--){
    if (stristr(strval($i), '3') && $i % 5 !== 0){
        //echo $i, "<br>";
    }
}
//ex12 ->
$rnd1 = rand(0, 100);
$rnd2 = rand(0, 100);
if ($rnd2 === $rnd1){
    $rnd2 +=5;
    if ($rnd2 > 100){
        $rnd2 -=10;
    }
}
$rnd3 = rand(0, 100);
if ($rnd3 ===$rnd1){
    $rnd3 +=10;
    if ($rnd3 > 100){
        $rnd3 -=20;
    }
}
if ($rnd3 ===$rnd2){
    $rnd3 +=3;
    if ($rnd3 > 100){
        $rnd3 -=6;
    }
}
echo $rnd1, ' ', $rnd2, ' ', $rnd3;
echo "<br>";
// ex13
echo 'Результат 13 задания скрыт, так как занимает очень много места' . "<br>";
$countHappyTickets = 0;
for ($i = 100000; $i < 1000000; $i++){
    $numStr = strval($i);
    $sumFirstPart = (int)$numStr[0] + (int)$numStr[1] + (int)$numStr[2];
    $sumSecondPart = (int)$numStr[5] + (int)$numStr[4] + (int)$numStr[3];
    if ($sumFirstPart === $sumSecondPart){
        $countHappyTickets++;
        //echo $i, "<br>";
    }
}
echo 'Процент от общего числа билетов: ', $countHappyTickets/10000, "<br>";
// ex14
$arr14 = [1, 2, 2, 3, 4];
if ($arr14 === array_unique($arr14)){
    echo 'В массиве нет дубликатов';
} else{
    echo 'В массиве есть дубликаты';
}
echo "<br>";
// ex15
$arr15 = [1, 4, 3, 7, 2];
var_dump($arr15);
echo "<br>";
$maxValue = max($arr15);
$minValue = min($arr15);
$maxKey = array_search($maxValue, $arr15);
$minKey = array_search($minValue, $arr15);
$arr15[$minKey] = $maxValue;
$arr15[$maxKey] = $minValue;
var_dump($arr15);
echo "<br>";
// ex16
$arr16 = [1, 2, 3 ,4 ,4, 5 ,6 ,7, 7, 8];
var_dump(array_unique($arr16));
echo "<br>";
// ex17
$arr17_1 = [2, 4, 6, 8];
$arr17_2 = [1, 3, 5, 7];
$arr17_3 = array_merge($arr17_1, $arr17_2);
sort($arr17_3);
var_dump($arr17_3);
echo "<br>";
// ex18
$weekDay = ['en' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'ru' => ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресение']];
echo $weekDay['ru'][0], '  ', $weekDay['en'][2], "<br>";
$lang = 'ru';
$day = 4;
echo $weekDay[$lang][$day], "<br>";
// ex19
$arr19 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
foreach ($arr19 as $value){
    echo $value;
    if ($value % 3 === 0){
        echo "<br>";
    } else {
        echo ', ';
    }
}
//ex20
$arr20 = [1, 3, 7, 8, 2, 4, 7, 0, 5, 6];
$index = 3;
if (array_key_exists($index, $arr20)){
    $temp = $arr20[0];
    $arr20[0] = $arr20[$index];
    $arr20[$index] = $temp;
    var_dump($arr20);
} else {
    echo 'Такого индекса в массиве нет', "<br>";
}
?>
</body>

</html>