<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 20.08.15
 * Time: 19:29
 */
function __autoload($className)
{

    if (file_exists("$className.php")){
        $n = explode("\\", $className);
        $name = end($n);
        echo "подключен файл $className.php<br>";
        include_once("core/".$name.".php");
    } else{
        echo "404 ERROR";
    }

}

