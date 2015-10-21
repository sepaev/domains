<?php
$login = $_POST["email"];
$pass = $_POST["password"];
$name = $_POST["name"];
$l_name = $_POST["l_name"];
$birthday = $_POST["birthday"];
$description = $_POST["description"];
$idGender = $_POST["idGender"];
$idQuestion = $_POST["idQuestion"];
$answer = $_POST["answer"];
$idTown = $_POST["idTown"];

if (!$login or !$pass){
	header ("location:".SITE."registration?err=1");
	die();
	}

$sql = "SELECT * FROM `userLogin` WHERE `login` = '$login'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
 	header ("location:".SITE."registration?err=3");
 	die();
}

if (!$birthday){
	header ("location:".SITE."registration?err=2");
	die();
}

if (!$idTown){
	header ("location:".SITE."registration?err=4");
	die();
}
if (!$idQuestion){
	header ("location:".SITE."registration?err=5");
	die();
}
if (!$answer){
	header ("location:".SITE."registration?err=6");
	die();
}
$file = $_FILES['file']['name'];

if (!$file){
	$file = $login.".png";
	$tmp = "lib/img/noface.png";
}else{
	$tmp = $_FILES['file']['tmp_name'];
	$filename = explode(".", $file);
	$file = $login.".".end($filename);
}
copy($tmp, "avatar/".$file);
//вставляю данные
$pass = md5($pass);
$answer = md5($answer);
$sql = "INSERT INTO `userLogin`(`login`, `password`, `id_question`, `answer`, `rule`) VALUES ('$login','$pass','$idQuestion','$answer','1')"; //0 - админ 1 - юзер
$result2 = mysqli_query($link, $sql);
$id = mysqli_insert_id($link);
if (!$result2){
	header ("location:".SITE."registration?err=7");
	die();
} else {
	$sql = "INSERT INTO `userData`(`idUser`, `firstName`, `lastName`, `birthday`, `avatar`, `gender`, `userInfo`, `idTown`) VALUES ('$id','$name','$l_name','$birthday','$file','$idGender','$description','$idTown')";
	$result3 = mysqli_query($link, $sql);
	if (!$result3){
		header ("location:".SITE."registration?err=8");
		die();
	} else {
		header ("location:".SITE."main?status=1&user=".$login);
		die();
	}
}
?>

