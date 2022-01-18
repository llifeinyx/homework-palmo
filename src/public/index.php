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
<!--<form action="home.php" enctype="multipart/form-data" method="post">-->
<!--    <h1>ФОРМА ДЛЯ ЗАГРУЗКИ ФАЙЛА</h1>-->
<!--    <label for="file">Загрузите файл формата txt:</label>-->
<!--    <input type="file" id="file" name="file" accept=".txt" required>-->
<!--    <input type="submit" value="отправить" name="send_file">-->
<!--</form>-->

<?php
function printFigure(Figure $figureObj){
    echo 'Фигура: ' . $figureObj->getType() . ', площадь: ' . $figureObj->findS() . ', периметр: '
        . $figureObj->findP() . "<br>";
}

class Figure
{
    protected $type;
    public function getType()
    {
        return $this->type;
    }
    public function findS()
    {

    }
    public function findP()
    {

    }
}
class Square extends Figure
{
    protected $side;
    public function __construct($side)
    {
        $this->type = 'Квадрат';
        $this->side = $side;
    }
    public function findS()
    {
        return $this->side * $this->side;
    }
    public function findP()
    {
        return $this->side * 4;
    }
}
class Triangle extends Figure
{
    protected $side1;
    protected $side2;
    protected $side3;
    public function __construct($side1, $side2, $side3)
    {
        $this->type = 'Треугольник';
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
    }
    public function findS()
    {
        return 1.56 * ($this->side1+$this->side2+$this->side3);
    }
    public function findP()
    {
        return $this->side1 + $this->side2 + $this->side3;
    }
}
class Circle extends Figure
{
    protected $radius;
    public function __construct($radius)
    {
        $this->type = 'Круг';
        $this->radius = $radius;
    }
    public function findS()
    {
        return $this->radius * $this->radius * 3.14152;
    }
    public function findP()
    {
        return $this->radius * 3.14152;
    }
}
$mySquare = new Square(4);
$myTriangle = new Triangle(6, 4, 3);
$myCircle = new Circle(5);

printFigure($mySquare);
printFigure($myTriangle);
printFigure($myCircle);

?>
</body>

</html>