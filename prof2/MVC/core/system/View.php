<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 03.09.15
 * Time: 20:50
 */

namespace core\system;


class View
{
    public function loader($name, $array)
    {
        include_once "view/head.php";
        include_once "view/header.php";
        include_once "view/".$name.".php";
        include_once "view/footer.php";
    }
}