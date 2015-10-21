<pre>
<?php
/**
 * Created by PhpStorm.
 * User: Sepaev
 * Date: 20.08.15
 * Time: 20:36
 */

$settings = "mysql:host=localhost;dbname=SocialNetwork_pavlovsky";
$password = "";
$username = "root";
$attr = [PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];// метод 1 для передачи ассоциативного массива
try {
    $db = new PDO ($settings, $username, $password, $attr);
}
catch (PDOException $e){
    echo $e->getMessage();
//    echo"<br>";
//    echo $e->getFile();
//    echo"<br>";
//    echo $e->getCode();
//    echo"<br>";
//    echo $e->getTraceAsString();
//    echo"<br>";

}
//
//var_dump($db);
//mail("putin@hamlo","Theme","text");

//$name = "Бред";
$name = "";
$lastName = "Питт";

//// 1 метод обычный без проверок
//$sql = "SELECT * FROM `userData` WHERE `firstName`= '$name' AND `lastName` = '$lastName'";
//$query = $db->query($sql);
//var_dump($query);
//while ($row = $query->fetch()){
////while ($row = $query->fetch(PDO::FETCH_ASSOC)){ //метод 2 для передачи ассоциативного массива
//    $array[] = $row;
//}

//// 2 метод с проверкой на ошибки ввода значений bindParam
//$sql = "SELECT * FROM `userData` WHERE `firstName`= :name AND `lastName` = :lastName";
//$query = $db->prepare($sql);
//$query->bindParam(":name", $name, PDO::PARAM_STR);
//$query->bindParam(":lastName", $lastName, PDO::PARAM_STR, 12);// 12- длина строки,
//                                                               PDO::PARAM_STR - перевод в строку
//$query->execute();
//$array = $query->fetchAll();

//// 3 метод параметры прописаны в execute
//$sql = "SELECT * FROM `userData` WHERE `firstName`= ? AND `lastName` = ?";
//$query = $db->prepare($sql);
//$query->execute([$name,$lastName]);
//$array = $query->fetchAll();

//// 4 метод bindParam
//$sql = "SELECT * FROM `userData` WHERE `firstName`= ? AND `lastName` = ?";
//$query = $db->prepare($sql);
//$query -> bindParam(1, $name);
//$query -> bindParam(2, $lastName);

//$query->execute();
//$array = $query->fetchAll();
//
//print_r($array);

$sql = "INSERT INTO `userData`(`firstName`,`lastName`) VALUES (?,?)";
$querry = $db->prepare($sql);
$querry->execute(["vova1", "Puilo1"]);
$id = $db->lastInsertId();

echo $id;