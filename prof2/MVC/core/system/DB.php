<?php
namespace core\system;

use \PDO;

interface IDB
{
    /**
     * @param $table - ����� �������
     * @param $what - ����� �������, �� ������� ��������� (���� false - ��� �� �������)
     * @param $where - ������������ ����� ������� - ��������
     * @param $orderColumn - ������� �� ��� ���������
     * @param $desc - ������ ����������
     * @param $limit - ����� ���� ([0-30]) �� ������������ 0-30
     * @return mixed - �������������� �����
     */
    function select($table, $what, $where, $orderColumn, $desc, $limit);

    /**
     * @param $table - ����� �������
     * @param $what - ����� �������, �� ������� ��������� (���� false - ��� �� �������)
     * @return mixed - �� ��������
     */
    function insert($table, $what);

    /**
     * @param $table - ����� �������
     * @param $what - ����� �������, �� ������� ��������� (���� false - ��� �� �������)
     * @param $where - ������������ ����� ������� - ��������
     * @return mixed
     */
    function update($table, $what, $where);

    /**
     * @param $table - ����� �������
     * @param $what - ����� �������, �� ������� ��������� (���� false - ��� �� �������)
     * @return mixed
     */
    function delete($table, $where);
}

class DB implements IDB
{
    public $dbSettings = "mysql:host=localhost;dbname=SocialNetwork_pavlovsky";
    public $tdbPassword = "";
    public $dbUsername = "root";
    public $dbAttr = [PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    private $db;

    /**
     * PHP 5 allows developers to declare constructor methods for classes.
     * Classes which have a constructor method call this method on each newly-created object,
     * so it is suitable for any initialization that the object may need before it is used.
     *
     * Note: Parent constructors are not called implicitly if the child class defines a constructor.
     * In order to run a parent constructor, a call to parent::__construct() within the child constructor is required.
     *
     * param [ mixed $args [, $... ]]
     * @return void
     * @link http://php.net/manual/en/language.oop5.decon.php
     */
    function __construct()
    {
        $this->db = new PDO ($this->dbSettings, $this->dbUsername, $this->dbPassword, $this->dbAttr);
        // TODO: Implement __construct() method.
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
            $text = $text . "`" . $table . "` WHERE ";
        } else {
            echo "���������� ������ �������� ������� (please enter the table name)";
            die();
        }
        // ������ ���������
        if (isset($where) and $where != "") {
            foreach ($where as $key => $value) {
                $text = $text . "`$key` = '$value' AND ";
            }
            $text = rtrim($text, "AND ");
        } else {
            $text = $text . "1 ";
        }
        // c��������a
        if (isset($orderColumn) and $orderColumn != "") {
            $text = $text . "ORDER BY `$orderColumn`";
            if ($desc == "ASC" || $desc == "DESC") {
                $text = $text . " $desc ";
            }
        }
        // �����

        if (isset($limit) and $limit != "") {
            if (count($limit) > 1) {
                $string = "LIMIT $limit[0],$limit[1]";
                if (preg_match("/[A-Z] \d,\d/", $string)) {
                    $text = $text . $string;
                }
            }
        }
        //echo $text;
        $query = $this->db->query($text);
        //var_dump($query);
        while ($row = $query->fetch()) {
            $array[] = $row;
        }
        return $array;

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
        if($querry->execute()){
            return true;
        } else{
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
        if($querry->execute()){return true;} else {return false;}

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
        if ($querry->execute()) {return true;} else {return false;}
    }
}
//
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
