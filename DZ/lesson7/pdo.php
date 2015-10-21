<?php

interface IDB
{
    /**
     * @param $table - Назва таблиці
     * @param $what - масив колонок, які потрібно повернути (якщо false - тоді всі колонки)
     * @param $where - асоціативний масив колонка - значення
     * @param $orderColumn - колонка по якій сортувати
     * @param $desc - напрям сортування
     * @param $limit - масив ліміту ([0-30]) за умовчуванням 0-30
     * @return mixed - результативний масив
     */
    function select($table, $what, $where, $orderColumn, $desc, $limit);

    /**
     * @param $table - Назва таблиці
     * @param $what - масив колонок, які потрібно повернути (якщо false - тоді всі колонки)
     * @return mixed - ід елементу
     */
    function insert($table, $what);

    /**
     * @param $table - Назва таблиці
     * @param $what - масив колонок, які потрібно повернути (якщо false - тоді всі колонки)
     * @param $where - асоціативний масив колонка - значення
     * @return mixed
     */
    function update($table, $what, $where);

    /**
     * @param $table - Назва таблиці
     * @param $what - масив колонок, які потрібно повернути (якщо false - тоді всі колонки)
     * @return mixed
     */
    function delete($table, $where);
}

class Base implements IDB
{
    public $dbSettings = "mysql:host=localhost;dbname=SocialNetwork_pavlovsky";
    public $dbPassword = "";
    public $dbUsername = "root";
    public $dbAttr = [PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

    /**
     * @param $table - Назва таблиці
     * @param $what - масив колонок, які потрібно повернути (якщо false - тоді всі колонки)
     * @param $where - асоціативний масив колонка - значення
     * @param $orderColumn - колонка по якій сортувати
     * @param $desc - напрям сортування
     * @param $limit - масив ліміту ([0-30]) за умовчуванням 0-30
     * @return mixed - результативний масив
     */
    public function select($table, $what, $where, $orderColumn, $desc, $limit)
    {
        $db = new PDO ($this->dbSettings, $this->dbUsername, $this->dbPassword, $this->dbAttr);
        $text = "SELECT ";
        // что ищем
        if (isset($what) and $what != "") {
            $text = $text . "`" . $what . "` FROM ";
        } else {
            $text = $text . "* FROM ";
        }
        // таблица в которой ищем
        if (isset($table) and $table != "") {
            $text = $text . "`" . $table . "` WHERE ";
        } else {
            echo "Необходимо ввести название таблицы (please enter the table name)";
            die();
        }
        // массив критериев
        if (isset($where) and $where != "") {
            foreach ($where as $key => $value) {
                $text = $text . "`$key` = '$value' AND ";
            }
            $text = rtrim($text, "AND ");
        } else {
            $text = $text . "1 ";
        }
        // cортировкa
        if (isset($orderColumn) and $orderColumn != "") {
            $text = $text . "ORDER BY `$orderColumn`";
            if ($desc == "ASC" || $desc == "DESC") {
                $text = $text . " $desc ";
            }
        }
        // лимит

        if (isset($limit) and $limit != "") {
            if (count($limit) > 1) {
                $string = "LIMIT $limit[0],$limit[1]";
                if (preg_match("/[A-Z] \d,\d/", $string)) {
                    $text = $text . $string;
                }
            }
        }
        echo $text;
        $query = $db->query($text);
        var_dump($querry);
        while ($row = $query->fetch()) {
            $array[] = $row;
        }
        echo "<pre>";
        print_r($array);

    }

    /**
     * @param $table - Назва таблиці
     * @param $what - масив колонок, які потрібно повернути (якщо false - тоді всі колонки)
     * @return mixed - ід елементу
     */

    public function insert($table, $what)
    {
        $db = new PDO ($this->dbSettings, $this->dbUsername, $this->dbPassword, $this->dbAttr);
        $text = "INSERT INTO ";
        // таблица в которую вставляем
        if (isset($table) and $table != "") {
            $text = $text . "`$table` ";
        } else {
            echo "Необходимо ввести название таблицы (please enter the table name)";
            die();
        }
        // что вставляем

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
            echo "Необходимо ввести данные (please enter the data)";
            die();
        }
        $querry = $db->prepare($text);
        $querry->execute();
        $id = $db->lastInsertId();
        echo $text;
        echo "<pre>";
        echo "последний вставленный элемент с номером $id";
    }

    /**
     * @param $table - Назва таблиці
     * @param $what - масив колонок, які потрібно повернути (якщо false - тоді всі колонки)
     * @param $where - асоціативний масив колонка - значення
     * @return mixed
     */

    public function update($table, $what, $where)
    {
        $db = new PDO ($this->dbSettings, $this->dbUsername, $this->dbPassword, $this->dbAttr);
        $text = "UPDATE ";
        // таблица в которую вставляем
        if (isset($table) and $table != "") {
            $text = $text . "`$table` ";
        } else {
            echo "Необходимо ввести название таблицы (please enter the table name)";
            die();
        }
        // что вставляем

        if (isset($what) and $what != "") {
            $text = $text . "SET ";
            foreach ($what as $key => $value) {
                $text = $text . "`$key` = '$value',";
            }
            $text = rtrim($text, ",");
        } else {
            echo "Необходимо ввести данные (please enter the data)";
            die();
        }
        // в каких значениях
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

        $querry = $db->prepare($sql);
        $querry->execute();

        echo "Запрос $text выполнен успешно";
    }

    /**
     * @param $table - Назва таблиці
     * @param $what - масив колонок, які потрібно повернути (якщо false - тоді всі колонки)
     * @return mixed
     */

    public function delete($table, $where)
    {
        $db = new PDO ($this->dbSettings, $this->dbUsername, $this->dbPassword, $this->dbAttr);
        $text = "DELETE FROM ";
        // таблица в которую вставляем
        if (isset($table) and $table != "") {
            $text = $text . "`$table` ";
        } else {
            echo "Необходимо ввести название таблицы (please enter the table name)";
            die();
        }
        // в каких значениях
        if (isset($where) and $where != "") {
            $text = $text . " WHERE ";
            foreach ($where as $key => $value) {
                $text = $text . "`$key` = '$value' AND ";
            }
            $text = rtrim($text, "AND ");
        } else {
            $text = $text . "1 ";
        }
        $querry = $db->prepare($text);
        $querry->execute();

        echo "Запрос $text выполнен успешно";
    }
}
$db = new Base();
$table = "userLogin";
$what = "";
$where = ["login" => 'sepaev@gmail.com', "password" => md5("33332200")];
$orderColumn = "login";
$desc = "ASC";
$limit = [0, 30];
$db->select($table, $what, $where, $orderColumn, $desc, $limit);
//
//$obj = new Base();
//$table = "userData";
//$what = "";
//$where = ["firstName" => "Putin1", "lastName" => "Vova1"];
//$orderColumn = "idUser";
//$desc = "ASC";
//$limit = [0, 3, 1];
//$obj->select($table, $what, $where, $orderColumn, $desc, $limit);

//$obj = new Base();
//$table = "userData";
//$what = ["firstName" => "Putin", "lastName" => "Vova","idUser" => rand(1, 100), "gender" => "male"];
//$obj->insert($table, $what);
//
//$obj = new Base();
//$table = "userData";
//$what = ["firstName" => "Putin1", "lastName" => "Vova1","userInfo" => rand(1, 100), "gender" => "1"];
//$where = ["firstName" => "Putin", "lastName" => "Vova"];
//$obj->update($table, $what, $where);
//
//$obj = new Base();
//$table = "userData";
//$where = ["firstName" => "Putin1", "lastName" => "Vova1", "idUser" => "76"];
//$obj->delete($table, $where);
