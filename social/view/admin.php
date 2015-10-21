<?php
include"core/auth_function.php";
if(!auth()){
		include('view/no_logged.php');
		die();
}else{?>
<p><font size="5" color="Green" face="Arial">МЕНЮ АДМИНИСТРАТОРА</b></font></p>
<a href='addTown'>Добавить горда</a><br>
<a href='addQuestion'>Добавить секретные вопросы</a><br>
<a href='userList'>Просмотреть пользователей</a><br>
<a href='main'>Выйти в главное меню</a>
<?php
}
?>