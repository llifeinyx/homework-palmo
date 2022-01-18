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
<?php

//main interface
interface JSONDecode
{
    public function setJSONString($JSONString);
    public function getJSONString();
    public function printJSONObject();
}

//main abstract class decorator from interface
abstract class JSONDecodeDecorator implements JSONDecode
{
    protected $JSONDecodeDecorated;
    public function __construct(JSONDecode $JSONDecodeDecorated)
    {
        $this->JSONDecodeDecorated = $JSONDecodeDecorated;
    }
    public function setJSONString($JSONString)
    {
        $this->JSONDecodeDecorated->setJSONString($JSONString);
    }
    public function getJSONString()
    {
        $this->JSONDecodeDecorated->getJSONString();
    }

    public function printJSONObject()
    {
        $this->JSONDecodeDecorated->printJSONObject();
    }
}

//class decorator from interface
class JSONDecodeExtendedInfoDecorator extends JSONDecodeDecorator
{
    public function __construct(JSONDecode $JSONDecodeDecorated)
    {
        parent::__construct($JSONDecodeDecorated);
    }
    private function printJSONString()
    {
        echo $this->JSONDecodeDecorated->getJSONString() . "<br>";
    }
    public function printJSONObject()
    {
        $this->printJSONString();
        $this->JSONDecodeDecorated->printJSONObject();
    }
}

//class from interface 1
class formatJSONObjectMedium implements JSONDecode
{
    protected $JSONObject;
    public function setJSONString($JSONString)
    {
        $this->JSONObject = json_decode($JSONString, true);
    }
    public function getJSONString()
    {
        return json_encode($this->JSONObject);
    }

    public function printJSONObject()
    {
        foreach ($this->JSONObject as $key => $item){
            echo $key . ": " . $item . "<br>";
        }
    }
}

//clas from interface 2
class formatJSONObjectLarge implements JSONDecode
{
    protected $JSONObject;
    public function setJSONString($JSONString)
    {
        $this->JSONObject = json_decode($JSONString, false);
    }
    public function getJSONString()
    {
        return json_encode($this->JSONObject);
    }
    public function printJSONObject()
    {
        var_dump($this->JSONObject);
        echo "<br>";
    }
}

/* test object */
$someObj = ['key1' => 'olo', 'key2' => 'lol', 'key3' => 'ool', 'key4' => 'llo'];

//functional default formatJSONObjectMedium class
echo "<br>" . "FIRST EXAMPLE" . "<br>";
$formatJMDefault = new formatJSONObjectMedium();
$formatJMDefault->setJSONString(json_encode($someObj));
$formatJMDefault->printJSONObject();

//functional decorated formatJSONObjectMedium class
echo "<br>" . "SECOND EXAMPLE" . "<br>";
$formatJMDecorated = new JSONDecodeExtendedInfoDecorator($formatJMDefault);
$formatJMDecorated->printJSONObject();

//functional default formatJSONObjectLarge class
echo "<br>" . "THIRD EXAMPLE" . "<br>";
$formatJLDefault = new formatJSONObjectLarge();
$formatJLDefault->setJSONString(json_encode($someObj));
$formatJLDefault->printJSONObject();

//functional decorated formatJSONObjectLarge class
echo "<br>" . "FOUR EXAMPLE" . "<br>";
$formatJLDecorated = new JSONDecodeExtendedInfoDecorator($formatJLDefault);
$formatJLDecorated->printJSONObject();

?>
</body>

</html>