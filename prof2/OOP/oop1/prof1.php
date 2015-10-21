<?php

class People {
    public $name;
    public $lname;

    function say($words = "") {
        if($words){
            echo "<br>$words";
        }else {
            echo "<br>Путин хамло";
        }
    }
    function sayName(){
        if ($this ->name == "Владимир"){
            echo "<br> Хамло";
        } else {
            echo "<br>" . $this->name;
        }
    }
    static function noice(){
        echo "<br>la-la-la";
    }
}


$obj = new People();

$obj ->name = "Владимир";
$obj ->lname = "Путин";
/*echo "Имя обьекта = " . $obj ->name."<br>Фамилия обьекта = " . $obj ->lname;
$obj ->say('Привет хамло');
$obj ->say();*/
$obj->sayName();
People::noice();

$dima= new people();
$dima -> name = "Дмитрий";
$dima -> lname = "Медведев";
$dima->sayName();

People::noice();