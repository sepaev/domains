<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 18.08.15
 * Time: 19:57
 */

abstract class People{
    public $name;
    abstract function eat();
    function __construct($name)
    {
        $this->name = $name;
        echo "Меня зовут ".$this->name."<br>";
    }
    public function sayName()
    {
        echo "Я ".$this->name." и я болтун ";
        $this->eat();
    }
}

class Girl extends People{
    public function eat ()
    {
        echo "Ням-ням<br>";
    }
}

class Man extends People{
    public function eat ()
    {
        echo "Чвак-чвак<br>";
    }
}

$obj1 = new Girl('Алина');
$obj2 = new Man('Путин');

foo($obj1);

foo($obj2);

function foo(People $obj){
    $obj->sayName();
    $obj->eat();
}

