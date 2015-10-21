<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 01.09.15
 * Time: 20:19
 */

namespace core\components\controller;


class Auth
{
    public $name;
    public $password;

    public function getAuth()
    {
        $this->name = $_POST['email'];
        $this->password = $_POST['password'];
        $model = new \core\components\model\Auth();
        $result = $model->authorization($this->name, $this->password);
        if (!$result) {
            $view = new \core\components\view\User();
            $view->authPage(['err'],[1]);
        } else{
            $view = new \core\components\view\User();
            $view->authSuccessPage();
        }

    }

    public function index()
    {
        echo "this is main page user";
    }
}


