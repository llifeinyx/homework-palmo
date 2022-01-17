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
    class Calc{
        protected $n1;
        protected $n2;
        public function __construct($n1, $n2)
        {
            $this->n1 = $n1;
            $this->n2 = $n2;
        }
        public function sum()
        {
            echo "Sum n=" , $this->n1 + $this->n2 , "<br>";
        }
        public function minus()
        {
            echo "Minus n=" ,$this->n1 - $this->n2 , "<br>";
        }
        public function multiply()
        {
            return $this->n1 * $this->n2;
        }
        public function delenie()
        {
            echo "delenie n=" , $this->n1 / $this->n2 , "<br>";
        }
    }
    $lol = new Calc(4, 2);
    $lol->sum();
    $lol->minus();
    $lol->multiply();
    $lol->delenie();


    class Worker{
        public $name;
        public $age;
        public $salary;
    }
    $obj1 = new Worker();
    $obj1->name = 'Иван';
    $obj1->age = 25;
    $obj1->salary = 1000;
    $obj2 = new Worker();
    $obj2->name = 'Вася';
    $obj2->age = 26;
    $obj2->salary = 2000;
    echo $obj1->salary + $obj2->salary, "<br>";
    echo $obj1->age + $obj2->age, "<br>";
    class Pow extends Calc{
        public function __construct($n1, $n2)
        {
            parent::__construct($n1, $n2);
        }
        public function pow()
        {
            echo 'ultra pow=' , $this->multiply() * $this->multiply(), "<br>";
        }
    }
    $lf = new Pow(2, 3);
    $lf->pow();
?>
</body>

</html>