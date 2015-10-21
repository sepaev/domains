<pre>
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27.08.2015
 * Time: 14:39
 */
$table = "userData";
$what = "";
$where = ["firstName" => "Putin", "lastName" => "Vova"];
$orderColumn = "idUser";
$desc = "ASC";
$limit = [0, 50, 1];
function insert($table, $what)
{
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
}

select($table, $what, $where, $orderColumn, $desc, $limit);