<?php
include_once "DB.php";
include_once "core/functions.php";

if (isset($_SESSION['login'])){
	$sender = $_SESSION['login'];
	$sender = getUserID($sender);
} else {
 	header ("location:".SITE."userList?status=4");
 	die();
}
$recipient = $_GET['id'];
$sql = "SELECT * FROM `friendsPair` WHERE `idSender` = ' $sender' AND idRecipient = '$recipient'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
 	header ("location:".SITE."userList?status=1&userId=$recipient");
 	die();
} else {
	$sql = "INSERT INTO `friendsPair`(`idSender`, `idRecipient`, `status`) VALUES ('$sender','$recipient',1)"; // 1 - статус друга
	if(mysqli_query($link, $sql)){
		header ("location:".SITE."userList?status=2&userId=$recipient");
		die();
	} else {
		header ("location:".SITE."userList?status=3&userId=$recipient");
		die();
	}
}

?>
