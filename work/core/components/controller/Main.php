<?php
/**
 * Created by PhpStorm.
 * User: Sepaev
 * Date: 01.09.15
 * Time: 20:32
 */

namespace core\components\controller;


class Main
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new \core\components\model\Main();
        $this->view = new \core\components\view\Main();

    }
    public function index()
    {
        if (!$this->model->auth()) {
            $this->view->no_logged("бш ме<br>юбрнпхгхпнбюмш<br>");
        } else {
            $this->view->start();
            die();
        }
    }

    public function auth_action()
    {
        if (!$this->model->auth_action()) {
            $this->view->no_logged("бш ббекх ме опюбхкэмши<br>оюпнкэ<br>");
            die();
        } else {
            $this->view->start();
            die();
        }
    }

    public function e404()
    {
        if (!$this->model->auth_action()) {
            $this->view->no_logged("бш ббекх ме опюбхкэмши<br>оюпнкэ<br>");
            die();
        } else {
            $this->view->start();
            die();
        }
    }

    public function logout()
    {
        session_destroy();
        setcookie("auth", "true", 1);
        setcookie("login", "no", 1);
        setcookie("token", "", 1);
        header("location:" . SITE);
    }
}