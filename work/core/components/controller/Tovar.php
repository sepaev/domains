<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 01.09.15
 * Time: 20:32
 */

namespace core\components\controller;


class Tovar
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
            $this->model = new \core\components\model\Tovar();
            $this->view = new \core\components\view\Tovar();
        }

    }

    public function prihod()
    {
        $this->view->prihodPage();
    }

    public function prod()
    {
        $data = $this->model->getAll();
        $this->view->prodPage($data);
    }

    public function vozvr()
    {
        $this->view->vozvrPage();
    }

    public function peredacha()
    {
        $this->view->peredachaPage();
    }

    public function pereocenka()
    {
        $this->view->pereocenkaPage();
    }

    public function getAll()
    {
        $data = $this->model->getAll();
        $this->view->allTovarPage($data);
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


    public function index()
    {
        $this->view->start();
    }
}