<?php
// getUserID()
// getUserNAME()
// getUserIMAGE()
// getUserINFO()
//
//
function getUserID($login){
	include "DB.php";
	$sql = "SELECT * FROM `userLogin` WHERE `login` = '$login'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row['idUser'];
}
function getUserNAME($id){
	include "DB.php";
	$sql = "SELECT * FROM `userLogin` WHERE `idUser` = '$id'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row['login'];
}
function getUserIMAGE($id){
	include "DB.php";
	$sql = "SELECT * FROM `userData` WHERE `idUser` = '$id'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row['avatar'];
}
function getUserDATA($id){
	include "DB.php";
	$sql = "SELECT * FROM `userLogin` LEFT JOIN `userData` ON `userLogin`.`idUser` = `userData`.`idUser` LEFT JOIN `town` ON `userData`.`idTown` = `town`.`idTown` WHERE `userLogin`.`idUser` = '$id'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
}
function getUserDATAbyLogin($login){
	include "DB.php";
	$sql = "SELECT * FROM `userLogin` LEFT JOIN `userData` ON `userLogin`.`idUser` = `userData`.`idUser` LEFT JOIN `town` ON `userData`.`idTown` = `town`.`idTown` WHERE `userLogin`.`login` = '$login'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
}
function getUserGENDER($gender){
	if ($gender = 1) {
		$result = "мужской";
	} else {
		$result = "женский";
	}
	return $result;
}

function frendList($id){
	include "DB.php";
	$sql = "SELECT * FROM `friendsPair` as f LEFT JOIN `userData` as ud ON f.`idRecipient` = ud.`idUser` LEFT JOIN `userLogin` as u ON f.`idRecipient` = u.`idUser` 
	            WHERE f.`idSender`='$id'";
	$result = mysqli_query($link, $sql);
	while ($row = mysqli_fetch_assoc($result)){
		$friends[] = $row;
	}
	    $sql = "SELECT * FROM `friendsPair` as f LEFT JOIN `userData` as ud ON f.`idSender` = ud.`idUser` LEFT JOIN `userLogin` as u ON f.`idSender` = u.`idUser` 
	            WHERE f.`idRecipient`='$id'";
	$result = mysqli_query($link, $sql);
	while ($row = mysqli_fetch_assoc($result)){
	    $friends[] = $row;
	}
	return $friends;
}

?>