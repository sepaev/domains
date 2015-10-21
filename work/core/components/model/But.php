<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 03.09.15
 * Time: 19:35
 */

namespace core\components\model;

use core\system\Model;

class But extends Model
{
    function getAll()
    {
        $this->table = "Точки";
        $array = $this->db->select($this->table, $this->what, $this->where, $this->orderColumn, $this->desc, $this->limit);
        //print_r($array);
        return $array;
    }

    function putOne()
    {
        $db = new \core\system\DB();
        $table = "userData";
        if ($_GET['idUser']) {
            $what["idUser"] = $_GET['idUser'];
        }
        if ($_GET['lastName']) {
            $what["lastName"] = $_GET['lastName'];
        }
        if ($_GET['firstName']) {
            $what["firstName"] = $_GET['firstName'];
        }
        if ($_GET['gender']) {
            $what["gender"] = $_GET['gender'];
        }
        if ($db->insert($table, $what)) {
            return true;
        } else {
            return false;
        }
    }

    function deleteOne()
    {
        $db = new \core\system\DB();
        $table = "userData";
        if ($_GET['idUser']) {
            $where["idUser"] = $_GET['idUser'];
        }
        if ($_GET['lastName']) {
            $where["lastName"] = $_GET['lastName'];
        }
        if ($_GET['firstName']) {
            $where["firstName"] = $_GET['firstName'];
        }
        if ($_GET['gender']) {
            $where["gender"] = $_GET['gender'];
        }
        if ($db->delete($table, $where)) {
            return true;
        } else {
            return false;
        }
    }

    function updateOne()
    {
        $db = new \core\system\DB();
        $table = "userData";
        if ($_GET['wt_idUser']) {
            $what["idUser"] = $_GET['wt_idUser'];
        }
        if ($_GET['wt_lastName']) {
            $what["lastName"] = $_GET['wt_lastName'];
        }
        if ($_GET['wt_firstName']) {
            $what["firstName"] = $_GET['wt_firstName'];
        }
        if ($_GET['wt_gender']) {
            $what["gender"] = $_GET['wt_gender'];
        }

        if ($_GET['wr_idUser']) {
            $where["idUser"] = $_GET['wr_idUser'];
        }
        if ($_GET['wr_lastName']) {
            $where["lastName"] = $_GET['wr_lastName'];
        }
        if ($_GET['wr_firstName']) {
            $where["firstName"] = $_GET['wr_firstName'];
        }
        if ($_GET['wr_gender']) {
            $where["gender"] = $_GET['wr_gender'];
        }
        if ($db->update($table, $what, $where)) {
            return true;
        } else {
            return false;
        }
    }
}