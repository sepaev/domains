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
            $this->table = "��������";
        }

        if (isset($_GET['what'])) {

            $this->what = iconv('UTF-8', 'windows-1251', $_GET['what']);
        } else {
            $this->what = "";
        }

        if (isset($_GET['where']) OR $_GET['where'] != "") {
//            $encode = mb_detect_encoding($_GET['what']);
//            echo $encode;
            $text = html_entity_decode($_GET['where']);
//            echo $text;
            $text = explode(";", $text);
//            print_r($text);
            foreach ($text as $key => $value) {
                $tmp = explode("=", $value);
//                print_r($tmp);
                $encode = mb_detect_encoding($tmp[0]);
                $tmp[0] = iconv($encode, 'windows-1251', $tmp[0]);
                $tmp[0] = ucfirst($tmp[0]);
                $decoded = iconv('UTF-8', 'windows-1251', $tmp[1]);
                if ($decoded) {
                    $tmp[1] = $decoded;
                }
                $this->where[$tmp[0]] = $tmp[1];
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