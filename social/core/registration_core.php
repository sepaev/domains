<?php
include_once "DB.php";
$sql = "SELECT * FROM `town` ORDER BY `townName`";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)){
	$towns[] = $row;
}

$sql = "SELECT * FROM `secretQuestion`";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)){
	$questions[] = $row;
}

if (isset($_GET['err'])){
	$err = $_GET['err'];
	switch ($err) {
		case '1':
			$err_message = 'Логин или пароль не могут быть пустыми';
			break;
		case '2':
			$err_message = 'Введите дату рождения';
			break;
		case '3':
			$err_message = 'Даный e-mail уже зарегистрирован';
			break;
		case '4':
			$err_message = 'Укажите свой город';
			break;
		case '5':
			$err_message = 'Укажите секретный вопрос';
			break;
		case '6':
			$err_message = 'Ответ не может быть пустым';
			break;
		case '7':
			$err_message = 'Ошибка базы данных таблицы "userLogin"';
			break;
		case '8':
			$err_message = 'Ошибка базы данных таблицы "userData"';
			break;
	}
}
?>

