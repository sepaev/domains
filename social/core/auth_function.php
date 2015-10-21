<?php
function auth(){
	if(!$_COOKIE['login']){
		$login = $_SESSION['login'];
		$token = $_SESSION['token'];
		if ($token == md5($login."login")) {
			return(TRUE);
		} else{
			return(FALSE);
		}
	} else {
		if(!$_SESSION['login']){
			return(FALSE);			
		} else {
			$login = $_SESSION['login'];
			$token = $_SESSION['token'];
			if ($token == md5($login."login")) {
				$_SESSION['login'] = $login;
				$_SESSION['token'] = $token;
				return(TRUE);
			} else{
				return(FALSE);
			}
		}
	}
}
?>
