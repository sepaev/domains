<?php
include_once "DB.php";
include_once "core/functions.php";
$login = $_SESSION['login'];
$id = getUserID($login);
$friends = frendList($id);
$sql = "SELECT * FROM `userLogin` as u LEFT JOIN `userData` as ud ON u.`idUser` = ud.`idUser` ORDER BY `login`";
$result = mysqli_query($link, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($result)){
	$users[] = $row;
	foreach ($friends as $friend) {
		if ($users[$i]['idUser'] == $friend['idUser']){
			$users[$i]['friend'] = 'true';
			break;
		} else {
			$users[$i]['friend'] = 'false';			
		}
	}
	$i++;
}

if (isset($_GET['status'])){
	$friendId = $_GET['userId'];
	$friend = getUserNAME($friendId);
	$status = $_GET['status'];
	switch ($status) {
		case '1':
			$err_message = "Ошибка!!! $friend уже в <a href='frendsList'>Ваших друзьях</a>";
			break;
		case '2':
			$err_message = "Пользователя $friend успешно добавлено в <a href='frendsList'>Ваши друзья</a>";
			break;
		case '3':
			$err_message = "Ошибка в процесе добавления/удаления пользователя $friend в <a href='frendsList'>друзья</a>";
			break;
		case '4':
			$err_message = "Вы не можете добавить/удалять друзей, так как вы не авторизированы";
			break;
		case '5':
			$err_message = "Вы успешно удалили $friend с <a href='frendsList'>Ваших друзей</a>.";
			break;
		case '6':
			$err_message = "Ответ не может быть пустым";
			break;
		case '7':
			$err_message = "Ошибка базы данных таблицы 'userLogin'";
			break;
		case '8':
			$err_message = 'Ошибка базы данных таблицы "userData"';
			break;
	} 
}
?>

