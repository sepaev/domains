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
$userID = $_GET['user'];
$pair = $_GET['pair'];
$sql = "DELETE FROM `friendsPair` WHERE `id` = ' $pair'";
if(mysqli_query($link, $sql)){
 	header ("location:".SITE."userList?status=5&userId=$userID");
 	die();
} else {
	header ("location:".SITE."userList?status=3&userId=$userID");
	die();
}

?>
