<?php
/**
 * Created by PhpStorm.
 * User: Sepaev
 * Date: 20.08.15
 * Time: 20:46
 */
$a = 5;
$b = $_GET['b'];
try {
    if ($b == 0) {
        throw new Exception("Division by zero");
    }
    $c = $a / $b;
    echo $c;
}

catch (Exception $ex){
//    die('404');
//    echo $ex->getMessage();

}