<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 15.09.15
 * Time: 18:19
 */
//соединение с базой в конструкторе

//$a=microtime(trure);
//echo $a;
//for($i=0;$i<=10000000;$i++){
//    $c++;
//}
//
//$b = microtime(true);
//$result = $b-$a;
//echo " ".$b." ".$result;


class DB
{
    private function __construct()
    {
        echo "Connect to db.. <br>";
    }
    public static function getInstance()
    {
        static $obj;
        if(!$obj) {$obj = new self();}
//        $obj = new self();
        return $obj;
    }
    public $host;
}

$obj1 = DB::getInstance();
$obj1->host = "localhost";
$obj2 = DB::getInstance();
echo $obj1->host;
echo $obj2->host;
