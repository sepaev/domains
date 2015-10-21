<pre>
<?php
/**
 * Created by PhpStorm.
 * User: Sepaev
 * Date: 20.08.15
 * Time: 20:19
 */
$obj = new mysqli("localhost", "root", "", "SocialNetwork_pavlovsky");
$sql = "SELECT * FROM userLogin";
$result = $obj->query($sql);
//var_dump($result);

//while ($row = $result->fetch_assoc()){
//    $array[] = $row;
//}

$array = $result->fetch_all(MYSQL_ASSOC);
print_r($array);

phpinfo();