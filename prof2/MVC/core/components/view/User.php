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
        $this->loader("getAllUsers", $array);
    }
    public function authPage($args)
    {
        $this->loader("auth", $args);
    }
    public function authSuccessPage()
    {
        $this->loader("authSuccess", null);
    }
}