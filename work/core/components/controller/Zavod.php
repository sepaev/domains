<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 01.09.15
 * Time: 20:32
 */

namespace core\components\controller;


class Zavod
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new \core\components\model\Main();
        $this->view = new \core\components\view\Main();
        if (!$this->model->auth()) {
            $this->view->no_logged("бш ме<br>юбрнпхгхпнбюмш<br>");
            die();
        } else {
            $this->model = new \core\components\model\Zavod();
            $this->view = new \core\components\view\Zavod();
        }

    }

    public function getAll()
    {
        $data = $this->model->getAll();
        $this->view->allZavodPage($data);
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
        $view->authPage(null);
    }

    public function index()
    {
        $this->view->start();
    }
}