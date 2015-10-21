<?php
function loadPage(){
	$uri = $_SERVER['REQUEST_URI'];
	$path = explode("/", $uri);
	$page = end($path);
    $page = preg_replace("/\?.*$/Uis", "", $page);

	switch ($page) {
		case '':
		case 'main':
			include('core/main_core.php');
			include('view/footer.php');	
			break;
		case 'addTown':
			include('core/addTown_core.php');
		    include('view/head.php');
			include('view/addTown.php');
			include('view/footer.php');			
			break;
		case 'addTown_action':
			include('action/addTown_action.php');
			break;
		case 'addQuestion':
			include('core/addQuestion_core.php');
		    include('view/head.php');
			include('view/addQuestion.php');
			include('view/footer.php');			
			break;
		case 'addQuestion_action':
			include('action/addQuestion_action.php');
			break;
		case 'registration':
			include('core/registration_core.php');	
		    include('view/head.php');
			include('view/registration.php');
			include('view/footer.php');	
			break;
		case 'registration_action':
			include('config.php');
			include('DB.php');
			include('action/registration_action.php');
			break;
		case 'changeAvatar_action':
			include('config.php');
			include('DB.php');
			include('action/changeAvatar_action.php');
			break;
		case 'changeAvatar':
			include('core/functions.php');
			include('core/changeAvatar_core.php');
		    include('view/head.php');
			include('view/changeAvatar.php');
			include('view/footer.php');	
			break;
		case 'auth':
		    include('view/head.php');
			include('view/auth.php');
			include('view/footer.php');	
			break;
		case 'auth_action':
			include('config.php');
			include('DB.php');
			include('action/auth_action.php');
			break;
		case 'admin':
		    include('view/head.php');
			include('view/admin.php');
			include('view/footer.php');	
			break;
		case 'userList':
		    include('core/userList_core.php');
		    include('view/head.php');
			include('view/userList.php');
			include('view/footer.php');	
			break;
		case 'frendsList':
		    include('core/frendsList_core.php');
		    include('view/head.php');
			include('view/frendsList.php');
			include('view/footer.php');	
			break;
		case 'addFriend_action':
			include('action/addFriend_action.php');
			break;
		case 'deleteFriend_action':
			include('action/deleteFriend_action.php');
			break;
		case 'userInfo':
			include('core/functions.php');
			include('core/userInfo_core.php');
		    include('view/head.php');
			include('view/userInfo.php');
			include('view/footer.php');	
			break;
		case 'message':
			include('core/functions.php');
			include('core/message_core.php');
		    include('view/head.php');
			include('view/message.php');
			include('view/footer.php');	
			break;
		case 'chat':
			include('core/functions.php');
			include('core/message_core.php');
		    include('view/head.php');
			include('view/chat.php');
			include('view/footer.php');	
			break;
		case 'message_action':
			include('action/message_action.php');
			break;
		case 'exit':
			include('core/exit.php');
			break;
		default:
			include('view/head.php');
			echo "<h1>404 Ошибка СНН</h1><br>(Страница Не Найдена)";
			include('view/footer.php');	
		}
	}
?>