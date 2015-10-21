<?php
namespace core\system;

use \PDO;

interface IDB
{
    function select($table, $what, $where, $orderColumn, $desc, $limit);

    function insert($table, $what);

    function update($table, $what, $where);

    function delete($table, $where);
}

class DB implements IDB
{
    public $dbPath = "C:\\OpenServer\\domains\\work\\db\\work.accdb";
    public $dbUsername = 'Admin';
    private $db;

    function __construct()
    {
        if (!file_exists($this->dbPath)) {
            die("Access database file not found !");
        }
        $this->db = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$this->dbPath;Uid=$this->dbUsername");

    }

    /**
     * @param $table - ����� �������
     * @param $what - ����� �������, �� ������� ��������� (���� false - ��� �� �������)
     * @param $where - ������������ ����� ������� - ��������
     * @param $orderColumn - ������� �� ��� ���������
     * @param $desc - ������ ����������
     * @param $limit - ����� ���� ([0-30]) �� ������������ 0-30
     * @return mixed - �������������� �����
     */
    public function select($table, $what, $where, $orderColumn, $desc, $limit)
    {
        $text = "SELECT ";
        // ��� ����
        if (isset($what) and $what != "") {
            $text = $text . "`" . $what . "` FROM ";
        } else {
            $text = $text . "* FROM ";
        }
        // ������� � ������� ����
        if (isset($table) and $table != "") {
            $text = $text . "`" . $table . "` ";
        } else {
            echo "���������� ������ �������� ������� (please enter the table name)";
            die();
        }
        // ������ ���������
        if (isset($where) and $where != "") {
            $text .= "WHERE ";
//            echo $where.'<br>';
            foreach ($where as $key => $value) {
                switch ($key) {
                    case "Cost_but":
                    case "Cost_zav":
                    case "Price_but":
                    case "Price_zav":
                    case "Fix_price_zav":
                        $tmp = explode(' ', $value);
                        $value = $tmp[0];
                    case "Key":
                    case "Kod_but":
                    case "Ves_iz":
                        $text = $text . "`$key` = $value AND ";
                        break;
                    case "Date_but":
                    case "Date_zav":
                    case "Date_prod":
                        $tmp = explode('-', $value);
                        $text = $text . "`$key` = #$tmp[1]/$tmp[2]/$tmp[0]# AND ";
                        break;
                    default:
                        $text = $text . "`$key` = '$value' AND ";
                }

            }
            $text = rtrim($text, "AND ");
        }
//        } else {
//            $text = $text . "1 ";
//        }
        // c��������a
        if (isset($orderColumn) and $orderColumn != "") {
            $text = $text . "ORDER BY `$orderColumn`";
            if ($desc == "ASC" || $desc == "DESC") {
                $text = $text . " $desc ";
            }
        }
        // �����

//        if (isset($limit) and $limit != "") {
//            if (count($limit) > 1) {
//                $string = "LIMIT $limit[0],$limit[1]";
//                if (preg_match("/[A-Z] \d,\d/", $string)) {
//                    $text = $text . $string;
//                }
//            }
//        }
//        echo $text;
//        $text = "SELECT * FROM ������ ORDER BY Kod_zav";
//       echo $text;
//
        $query = $this->db->query($text);

//        echo "1212";
//        var_dump($query);
//
        if ($query == false) {
            return NULL;
        } else {
            while ($row = $query->fetch()) {
                $array['result'][] = $row;
                if (++$count > $limit - 1) {
                    break;
                }

            }
            $array['sys']['sql']= $text;
            return $array;
        }
    }

    /**
     * @param $table - ����� �������
     * @param $what - ����� �������, �� ������� ��������� (���� false - ��� �� �������)
     * @return mixed - �� ��������
     */

    public function insert($table, $what)
    {
        $text = "INSERT INTO ";
        // ������� � ������� ���������
        if (isset($table) and $table != "") {
            $text = $text . "`$table` ";
        } else {
            echo "���������� ������ �������� ������� (please enter the table name)";
            die();
        }
        // ��� ���������

        if (isset($what) and $what != "") {
            $text = $text . "(";
            foreach ($what as $key => $value) {
                $text = $text . "`$key`, ";
            }
            $text = rtrim($text, ", ");
            $text = $text . ") VALUES (";
            foreach ($what as $key => $value) {
                $text = $text . "'$value', ";
            }
            $text = rtrim($text, ", ");
            $text = $text . ")";
        } else {
            echo "���������� ������ ������ (please enter the data)";
            die();
        }
        $querry = $this->db->prepare($text);
        if ($querry->execute()) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * @param $table - ����� �������
     * @param $what - ����� �������, �� ������� ��������� (���� false - ��� �� �������)
     * @param $where - ������������ ����� ������� - ��������
     * @return mixed
     */

    public function update($table, $what, $where)
    {
        $text = "UPDATE ";
        // ������� � ������� ���������
        if (isset($table) and $table != "") {
            $text = $text . "`$table` ";
        } else {
            echo "���������� ������ �������� ������� (please enter the table name)";
            die();
        }
        // ��� ���������

        if (isset($what) and $what != "") {
            $text = $text . "SET ";
            foreach ($what as $key => $value) {
                $text = $text . "`$key` = '$value',";
            }
            $text = rtrim($text, ",");
        } else {
            echo "���������� ������ ������ (please enter the data)";
            die();
        }
        // � ����� ���������
        if (isset($where) and $where != "") {
            $text = $text . " WHERE ";
            foreach ($where as $key => $value) {
                $text = $text . "`$key` = '$value' AND ";
            }
            $text = rtrim($text, "AND ");
        } else {
            $text = $text . "1 ";
        }
        $sql = $text;

        $querry = $this->db->prepare($sql);
        if ($querry->execute()) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * @param $table - ����� �������
     * @param $what - ����� �������, �� ������� ��������� (���� false - ��� �� �������)
     * @return mixed
     */

    public function delete($table, $where)
    {
        $text = "DELETE FROM ";
        // ������� � ������� ���������
        if (isset($table) and $table != "") {
            $text = $text . "`$table` ";
        } else {
            echo "���������� ������ �������� ������� (please enter the table name)";
            die();
        }
        // � ����� ���������
        if (isset($where) and $where != "") {
            $text = $text . " WHERE ";
            foreach ($where as $key => $value) {
                $text = $text . "`$key` = '$value' AND ";
            }
            $text = rtrim($text, "AND ");
        } else {
            $text = $text . "1 ";
        }
        $querry = $this->db->prepare($text);
        if ($querry->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

//�������
//$obj = new DB();
//$table = "userData";
//$what = "";
//$where = ["firstName" => "Putin1", "lastName" => "Vova1"];
//$orderColumn = "idUser";
//$desc = "ASC";
//$limit = [0, 3, 1];
//$obj->select($table, $what, $where, $orderColumn, $desc, $limit);

//$obj = new DB();
//$table = "userData";
//$what = ["firstName" => "Putin", "lastName" => "Vova","idUser" => rand(1, 100), "gender" => "male"];
//$obj->insert($table, $what);
//
//$obj = new DB();
//$table = "userData";
//$what = ["firstName" => "Putin1", "lastName" => "Vova1","userInfo" => rand(1, 100), "gender" => "1"];
//$where = ["firstName" => "Putin", "lastName" => "Vova"];
//$obj->update($table, $what, $where);
//
//$obj = new DB();
//$table = "userData";
//$where = ["firstName" => "Putin1", "lastName" => "Vova1", "idUser" => "76"];
//$obj->delete($table, $where);
