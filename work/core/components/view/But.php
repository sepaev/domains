<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 03.09.15
 * Time: 20:25
 */

namespace core\components\view;


use core\system\View;

class But extends View
{
    public function allButPage($array)
    {
        $this->loader("But","getAllBut", $array, "ÑÏÈÑÎÊ ÌÀÃÀÇÈÍÎÂ");
    }
    public function start ()
    {
        $this->loader("But","butStart", null, "ÒÎĞÃÎÂÛÅ ÒÎ×ÊÈ");
    }
}