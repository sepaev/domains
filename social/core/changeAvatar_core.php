<?php
include"core/auth_function.php";
if(!auth()){
		include('view/head.php');
		include('view/no_logged.php');
		include('view/footer.php');	
		die();
}else{
	include_once "config.php";
	include_once "DB.php";
	$user = getUserDATAbyLogin($_SESSION['login']);
	$avatar = $user['avatar'];
	if (isset($_GET['status'])){
		$status = $_GET['status'];
		if ($status=1) {
			$message = "У пользователя ".$user['firstName']." ".$user['lastName']." аватар успешно изменен";
		}else{
			$message = "ошибка во время замены аватара";
		}

	}
}
?>