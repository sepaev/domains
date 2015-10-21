<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 01.09.15
 * Time: 20:19
 */

namespace core\components\controller;


class User
{
    public function getAll()
    {
        $model = new \core\components\model\User();
        $data = $model->getAll();
        $view = new \core\components\view\User();
        $view ->allUserPage($data);
    }
    public function putOne()
    {
        $model = new \core\components\model\User();
        $data = $model->putOne();
//        $view = new \core\components\view\User();
//        $view ->allUserPage($data);
    }
    public function deleteOne()
    {
        $model = new \core\components\model\User();
        $data = $model->deleteOne();
//        $view = new \core\components\view\User();
//        $view ->allUserPage($data);
    }
    public function updateOne()
    {
        $model = new \core\components\model\User();
        $data = $model->updateOne();
//        $view = new \core\components\view\User();
//        $view ->allUserPage($data);
    }
    public function auth()
    {
//        $model = new \core\components\model\Auth();
//        $data = $model->getAllUsers();
        $view = new \core\components\view\User();
        $view ->authPage(null);
    }
    public function index()
    {echo "this is main page user";}
}