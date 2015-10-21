<?php
$file = $_FILES['file']['name'];
$login = $_POST['userLogin'];
$id = $_POST['userId'];
//	print_r ($_FILES);
if (!$file){
	$file = $login.".png";
	$tmp = "lib/img/noface.png";
}else{
	$tmp = $_FILES['file']['tmp_name'];
	$filename = explode(".", $file);
	$file = $login.".".end($filename);
}
if(copy($tmp, "avatar/".$file)){
	$sql = "UPDATE `userData` SET `avatar`='$file' WHERE `idUser` = '$id'";
	mysqli_query($link, $sql);
	header ("location:".SITE."changeAvatar?status=1&id=$id");
	die();
} else {
	header ("location:".SITE."changeAvatar?status=2&id=$id");
	die();
	}
?>

