<?php
include_once "config.php";
include_once "core/functions.php";
include_once "DB.php";

$message = $_POST['message'];
$idRecipient = $_POST['userId'];
$idSender = getUserID($_SESSION['login']);

$sql = "INSERT INTO `messages`(`idSender`, `idRecipient`, `message`) VALUES ('$idSender','$idRecipient','$message')";	
if(mysqli_query($link, $sql)){
	header ("location:".SITE."chat?id=$idRecipient");
}else{
	header ("location:".SITE."message?id=$idRecipient&status=2");
}
?>