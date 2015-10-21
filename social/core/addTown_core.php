<?php
include"core/auth_function.php";
if(!auth()){
	    include('view/head.php');
		include('view/no_logged.php');
		die();
}else{
	if (isset($_GET['add'])){
		$add = $_GET['add'];
		$text=$text."успешно добавлено $add городов<br>";
	}
	if (isset($_GET['err'])){
		$err = $_GET['err'];
		$text=$text."проигнорировано $err городов из-за совпадений<br>";
	}
	if (isset($_GET['sql'])){
		$sql = $_GET['sql'];
		$text=$text."$sql ошибок базы данных<br>";
	}
}
?>
