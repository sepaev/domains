<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 03.09.15
 * Time: 20:25
 */

namespace core\components\view;


use core\system\View;

class Main extends View
{
//    public function allUserPage($array)
//    {
//        $this->loader("getAllUsers", $array);
//    }
    public function authPage($args)
    {
        $this->loader("Main", "auth", $args, "ÀÂÒÎĞÈÇÀÖÈß");
    }
    public function no_logged ($status)
    {
        $this->loader("Main", "no_logged", $status, "ÂÛ ÍÅ ÀÂÒÎĞÈÇÈĞÎÂÀÍÛ");
    }
    public function start ()
    {
        $this->loader("Main", "start", null, "ÃËÀÂÍÀß");
    }
    public function e404 ($status)
    {
        $this->loader("Main", "e404", $status, "ÑÒĞÀÍÈÖÀ ÍÅ ÍÀÉÄÅÍÀ");
    }
}