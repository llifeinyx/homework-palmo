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
<div>
    <a href="addNews.php">Добавить новость</a>
</div>
<div>
    <a href="newsList.php">Посмотреть новости</a>
</div>
<!--<form action="home.php" enctype="multipart/form-data" method="post">-->
<!--    <h1>ФОРМА ДЛЯ ЗАГРУЗКИ ФАЙЛА</h1>-->
<!--    <label for="file">Загрузите файл формата txt:</label>-->
<!--    <input type="file" id="file" name="file" accept=".txt" required>-->
<!--    <input type="submit" value="отправить" name="send_file">-->
<!--</form>-->

<?php
/*
include 'news/page.php';
include 'blog/page.php';

use \blog\Page as BlogPage;
use \news\Page as NewsPage;

$lol1 = new BlogPage();
$lol1->load();
$lol2 = new NewsPage();
$lol2->load();

abstract class User
{
    protected $name;

    abstract public function showRole();

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

}

class Admin extends User
{
    public function showRole()
    {
        return 'admin';
    }
}
class Visitor extends User
{
    public function showRole()
    {
        return 'visitor';
    }
}
$userAdmin = new Admin('Zhan');
$userVisitor = new Visitor('Boyko');
echo $userAdmin->showRole() . "<br>";
echo $userVisitor->showRole() . "<br>";

interface Cauntable
{
    public function count();
}
class Sum implements Cauntable
{
    protected $x;
    protected $y;
    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }
    public function count()
    {
        return $this->x + $this->y;
    }
}
class Multiply implements Cauntable
{
    protected $x;
    protected $y;
    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }
    public function count()
    {
        return $this->x * $this->y;
    }
}

$sum = new Sum(4, 5);
$mul = new Multiply(4, 5);
echo 'Сумма: ' , $sum->count(), "<br>";
echo 'Произвдение: ' , $mul->count(), "<br>";

interface ArrayCrudInterface
{
    public function create($arr);
    public function read($i);
    public function update($item);
    public function delete($i);
}
class ArrayCrud implements ArrayCrudInterface
{
    public $arr;
    public function create($arr)
    {
        $this->arr = $arr;
    }
    public function read($i)
    {
        return $this->arr[$i];
    }
    public function update($item)
    {
        array_push($this->arr, $item);
    }
    public function delete($i)
    {
        unset($this->arr[$i]);
    }
}
$arrCrad = new ArrayCrud();
$arrCrad->create([1, 2, 3]);
var_dump($arrCrad->arr);
echo "<br>";
echo "Элемент по индексу ", 2, ": ",$arrCrad->read(2), "<br>";
$arrCrad->update(4);
var_dump($arrCrad->arr);
echo "<br>";
$arrCrad->delete(3);
var_dump($arrCrad->arr);
echo "<br>";*/

//EXAM



?>
</body>

</html>