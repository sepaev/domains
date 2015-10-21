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
        $this->loader("Tovar","tovarStart", null, "“Œ¬¿–");
    }
    public function allTovarPage($array)
    {
        $this->loader("Tovar","allTovarPage", $array, "—œ»—Œ  “Œ¬¿–Œ¬");
    }
    public function prihodPage()
    {
        $this->loader("Tovar","prihodPage", null, "œ–»’Œƒ");
    }
    public function prodPage($array)
    {
        $this->loader("Tovar","prodPage", $array, "œ–Œƒ¿∆¿");
    }
    public function vozvrPage()
    {
        $this->loader("Tovar","vozvrPage", null, "¬Œ«¬–¿“");
    }
    public function peredachaPage()
    {
        $this->loader("Tovar","peredachaPage", null, "œ≈–≈ƒ¿◊¿");
    }
    public function pereocenkaPage()
    {
        $this->loader("Tovar","pereocenkaPage", null, "œ≈–≈Œ÷≈Õ ¿");
    }
}