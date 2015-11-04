<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.10.2015
 * Time: 17:13
 */

namespace core\system;


class Model
{
    public $table;
    public $what;
    public $where;
    public $orderColumn;
    public $limit;
    public $desc;
    public $db;

    public function __construct()
    {
        if (isset($_GET['table'])) {

            $this->table = iconv('UTF-8', 'windows-1251', $_GET['table']);
        } else {
            $this->table = "а√лавна€";
        }

        if (isset($_GET['what'])) {

            $this->what = iconv('UTF-8', 'windows-1251', $_GET['what']);
        } else {
            $this->what = "";
        }

        if (isset($_GET['where']) OR $_GET['where'] != "") {
            $text = html_entity_decode($_GET['where']);
            $text = explode(";", $text);
            //todo разделение
            $i=0;
            foreach ($text as $key => $value) {
                $tmp=null;
                $some=null;
                $sign=null;
                $some = explode("=", $value);
                if (count($some)>1){
                    $tmp=$some;
                    $sign = "=";}
                $some = explode("==", $value);
                if (count($some)>1){
                    $tmp=$some;
                    $sign = "=";}
                $some = explode("like", $value);
                if (count($some)>1){
                    $tmp=$some;
                    $sign = "=";}

                $some = explode(">", $value);
                if (count($some)>1){
                    $tmp=$some;
                    $sign = ">=";}
                $some = explode("<", $value);
                if (count($some)>1){
                    $tmp=$some;
                    $sign = "<=";}

                $some = explode("!=", $value);
                if (count($some)>1){
                    $tmp=$some;
                    $sign = "<>";}
                $some = explode("<>", $value);
                if (count($some)>1){
                    $tmp=$some;
                    $sign = "<>";}

                $some = explode("not like", $value);
                if (count($some)>1){
                    $tmp=$some;
                    $sign = "<>";}

//                print_r($tmp);
                $encode = mb_detect_encoding($tmp[0]);
                $tmp[0] = iconv($encode, 'windows-1251', $tmp[0]);
                $tmp[0] = ucfirst($tmp[0]);
                $decoded = iconv('UTF-8', 'windows-1251', $tmp[1]);
                if ($decoded) {
                    $tmp[1] = $decoded;
                }
                $this->where[$i]['param'] = $tmp[0];
                $this->where[$i]['sign'] = $sign;
                $this->where[$i]['value'] = $tmp[1];
                $i++;
            }

        } else {
            $this->where = null;
        }

//            print_r($this->where);


        if (isset($_GET['limit'])) {
            $this->limit = $_GET['limit'];
        } else {
            $this->limit = 100;
        }

        if (isset($_GET['orderColumn'])) {
            $this->orderColumn = iconv('UTF-8', 'windows-1251', $_GET['orderColumn']);
        } else {
            $this->orderColumn = null;
        }
        $this->desc = "ASC";

        $this->db = new \core\system\DB();
    }

    public
    function footer()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $text = explode("?", $uri);
        $uri = explode("/", $text[0]);
        return $uri;
    }
}