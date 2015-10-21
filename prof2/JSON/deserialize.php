<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 08.09.15
 * Time: 20:06
 */
echo "<pre>";

//$text = "[4,3,6,2,6,8,434]";
//$result  = json_decode($text);
//
//var_dump($result);

$json = file_get_contents("result.json");
$result  = json_decode($json);
//$result  = json_decode($json,true);
//echo $result->name;
