<?php
include"core/auth_function.php";
if(!auth()){
		include('view/head.php');
		include('view/no_logged.php');
		die();
}else{
	if (isset($_GET['status'])){
		if ($_GET['status']==1){
			$text = "Вопрос ".$_GET['question']." успешно добавлен";
		} elseif ($_GET['status']==3) {
			$text = "Вопрос ".$_GET['question']." уже существует";
		} elseif ($_GET['status']==2) {
			$text = "Неизвестная ошибка";
		} else{
			$text = "Пожалуйсте введите вопрос";
		}
	}
}
?>
