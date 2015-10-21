<?php
function __autoload($className)
{
    if (file_exists("core/$className.php")){
        include_once("core/$className.php");
}

}

//include_once("core/Foo.php");

$obj1 = new Foo();
$obj2 = new Bar();
var_dump($obj1);
var_dump($obj2);