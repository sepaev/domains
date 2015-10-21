<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 03.09.15
 * Time: 19:35
 */

namespace core\components\model;


class Main
{
    function auth_action()
    {
        $password = $_POST["password"];
        $password = md5($password);
        $login = "950d2bb1af3d40a638b4c40cc6117213";
        if ($password == $login) {

            $token = md5($login . date("j-M-Y"));
            $_SESSION['auth'] = "true";
            $_SESSION['login'] = $login;
            $_SESSION['token'] = $token;

            setcookie("auth", "true", time() + 3600, "/");//куки на час
            setcookie("login", $login, time() + 3600, "/");
            setcookie("token", $token, time() + 3600, "/");
            return true;
        } else {

            $_SESSION['auth'] = "false";
            $_SESSION['login'] = NULL;
            $_SESSION['token'] = NULL;
            return false;
        }
    }

    function auth()
    {
        if (!$_COOKIE['login']) {
            $login = $_SESSION['login'];
            $token = $_SESSION['token'];
            if ($token == md5($login . date("j-M-Y"))) {

                return (TRUE);
            } else {

                return (FALSE);
            }
        } else {
            if (!$_SESSION['login']) {
                return (FALSE);
            } else {
                $login = $_SESSION['login'];
                $token = $_SESSION['token'];
                if ($token == md5($login . date("j-M-Y"))) {
                    $_SESSION['login'] = $login;
                    $_SESSION['token'] = $token;
                    return (TRUE);
                } else {
                    return (FALSE);

                }
            }
        }
    }
}