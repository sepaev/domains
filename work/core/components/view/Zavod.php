<?php
/**
 * Created by PhpStorm.
 * User: Sepaev
 * Date: 03.09.15
 * Time: 20:25
 */

namespace core\components\view;


use core\system\View;

class Zavod extends View
{
    public function allZavodPage($array)
    {
        $this->loader("Zavod","getAllZavod", $array, null);
    }
    public function start ()
    {
        $this->loader("Zavod","zavodStart", null, "онярюбыхйх");
    }
}