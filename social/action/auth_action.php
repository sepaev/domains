<?php
$login = $_POST["email"];
$password = $_POST["password"];
$password = md5($password);

	$sql = "SELECT * FROM `userLogin` WHERE `login` = '$login' AND `password` = '$password'";

	$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result)>0){

	$_SESSION['auth'] = "true";
	$_SESSION['login'] = $login;
	$token = md5($login."login");
	$_SESSION['token'] = $token;
	
	if (isset($_POST["memory"])){
		setcookie("auth","true",1,"/");
		setcookie("login",$login,1,"/");
		setcookie("token","",1,"/");
	} else {
		setcookie("auth","true",time()+3600,"/");//куки на час
		setcookie("login", $login,time()+3600,"/");
		setcookie("token",$token,time()+3600,"/");
	}
		header ("location:".SITE."main");
} else {

	$_SESSION['auth'] = "false";
	$_SESSION['login'] = "";
	header ("location:".SITE."main?status=2&user=".$login);

}

?>