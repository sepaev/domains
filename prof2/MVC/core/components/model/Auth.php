<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 03.09.15
 * Time: 19:35
 */

namespace core\components\model;


class auth
{
    function authorization($login,$password)
    {
        $password = md5($password);

        $db = new \core\system\DB();
        $table = "userLogin";
        $what = "";
        $where = ["login" =>$login, "password" => $password];
        $orderColumn = "login";
        $desc = "ASC";
        $limit = [0, 30];
        $result = $db->select($table, $what, $where, $orderColumn, $desc, $limit);

if(count($result)>0){

    $_SESSION['auth'] = "true";
    $_SESSION['login'] = $login;
    $token = md5($login."login");
    $_SESSION['token'] = $token;

    if (isset($_POST["memory"])){
        setcookie("auth","true",1,"/");
        setcookie("login",$login,1,"/");
        setcookie("token","",1,"/");
    } else {
        setcookie("auth","true",time()+3600,"/");//куки на час
        setcookie("login", $login,time()+3600,"/");
        setcookie("token",$token,time()+3600,"/");
    }
    return true;
} else {

    $_SESSION['auth'] = "false";
    $_SESSION['login'] = "";
    return false;

}


    }
}