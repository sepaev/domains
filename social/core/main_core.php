<?php
include_once "core/functions.php";

if (isset($_GET['status'])){
	if ($_GET['status']==1){
		$text = "Пользователь <b>".$_GET['user']."</b> успешно добавлен.<br>Вы можете авторизироваться.";
	} elseif ($_GET['status']==2) {
		$text = "Неправильный пароль";
	}
}
include"core/auth_function.php";
if(!auth()){
	    include('view/head.php');
		include('view/no_logged.php');
		die();
}else{
if(!$_SESSION['login']) {
    	$login = $_COOKIE['login'];
		$_SESSION['login'] = $login;
    }else{
    	$login = $_SESSION['login'];
    }
$id = getUserID($login);
$img = getUserIMAGE($id);

include('view/head.php');
include('view/main.php');
}
?>
