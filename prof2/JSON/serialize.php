<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 08.09.15
 * Time: 19:34
 */
//$array = [
//    "fd"=>"1",
//    "Putin hamlo"=>"YES",
//    "la-la-la"=> "NO"];
//
//$json = json_encode($array);
//
//echo $json;

class Foo   {
    public $name;
    public $l_name;
    public $b_date;

}

$obj = new Foo();
$obj->name = "Vova";
$obj->l_name = "Putin";
$obj->b_date = new DateTime("22-12-1953");

$json = json_encode($obj);
//file_put_contents("result.json",$json);

echo $json;