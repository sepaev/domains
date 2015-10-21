<?php
include_once "config.php";
include_once "DB.php";

$user = getUserDATA($_GET['id']);
$user['gender'] = getUserGENDER($user['gender']);
$sql_info = "SELECT * FROM `friendsPair` WHERE `idSender` = '".$user['idUser']."' 
			OR `idRecipient` = '".$user['idUser']."'";
$result = mysqli_query($link, $sql_info);
$user['numFriends'] = mysqli_num_rows($result);
?>