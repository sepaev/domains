<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 03.09.15
 * Time: 20:25
 */

namespace core\components\view;


use core\system\View;

class User extends View
{
    public function allUserPage($array)
    {
        $this->loader("User" , "getAllUsers", $array, null);
    }
    public function authPage($args)
    {
        $this->loader("User" , "auth", $args, "ÀÂÒÎÐÈÇÀÖÈß");
    }
    public function authSuccessPage()
    {
        $this->loader("User" , "authSuccess", null, null);
    }
}