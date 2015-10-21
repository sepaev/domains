<?php
/**
 * Created by PhpStorm.
 * User: Sepaev
 * Date: 01.09.15
 * Time: 20:06
 */
function __autoload($className){
    if (file_exists($className.".php")){
        include_once($className.".php");
    }
}