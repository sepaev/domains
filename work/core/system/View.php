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
    public function loader($control,$name, $args, $PAGE)
    {
        include_once "view/head.php";
        include_once "view/".$control."/".$name.".php";
//        $string = "view/".$control."/".$name."Footer.php";
        if (file_exists($string)) {
            include_once $string;
        } else {
            include_once "view/footer.php";
        }
    }
}