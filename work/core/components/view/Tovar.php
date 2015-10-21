<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 03.09.15
 * Time: 20:25
 */

namespace core\components\view;


use core\system\View;

class Tovar extends View
{
     public function start()
    {
        $this->loader("Tovar","tovarStart", null, "�����");
    }
    public function allTovarPage($array)
    {
        $this->loader("Tovar","allTovarPage", $array, "������ �������");
    }
    public function prihodPage()
    {
        $this->loader("Tovar","prihodPage", null, "������");
    }
    public function prodPage($array)
    {
        $this->loader("Tovar","prodPage", $array, "�������");
    }
    public function vozvrPage()
    {
        $this->loader("Tovar","vozvrPage", null, "�������");
    }
    public function peredachaPage()
    {
        $this->loader("Tovar","peredachaPage", null, "��������");
    }
    public function pereocenkaPage()
    {
        $this->loader("Tovar","pereocenkaPage", null, "����������");
    }
}