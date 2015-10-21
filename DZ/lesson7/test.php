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
    echo $text;
}

select($table, $what, $where, $orderColumn, $desc, $limit);