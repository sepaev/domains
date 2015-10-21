<?php

class People
{
    public $name;
    public $data;

    function __construct($name)
    {
        echo "Я родился <br>";
        $this->name = $name;
    }

    function sayName()
    {
        echo 'Меня зовут ' . $this->name . '<br>';
    }

    function __destruct()
    {
        echo $this->name . " удален";
    }

    function __toString()
    {
        return "this is object Girl<br>";
    }

    function __invoke()
    {
        return "this is object";
    }
}

class Girl extends People
{
    private $age;

    function __construct($name)
    {
        parent::__construct($name);
        echo "я девочка<br>";
    }


    function __set($name, $value)
    {
        $this->data[$name] = $value;

    }
    function __get($name){
        return $this->data[$name];
    }
    function __isset($name){
        return isset ($this->data[$name]);
    }
    function __unset($name){
        unset ($this->data[$name]);
    echo "unset<br>";
    }
    function __call($methodName,$args){
        echo "You try to call $methodName <br>";
        print_r($args);
        echo $args[5]->sayName();
    }
}

$first = new People('putin');
$first->sayName();
$obj = new Girl('Алина');
$obj->sayName();

$obj->putin(1,2,3,5,5, new People ("hello"));
//echo ($obj);
//echo obj();
//unset($obj);
//echo "<br>hello<br>";
//
//$obj->age = 33;
//$obj->weight = 90;
//echo '<pre>';
//var_dump($obj);
//echo'<br>';
//
//if (isset($obj->age)){
//    echo $obj->age;
//} else{
//    echo "error";
//}
//echo'<br>';
//
//echo $obj->age;
//echo $obj->weight;
//
//unset ($obj->age);
//var_dump($obj);
//echo $obj->age;