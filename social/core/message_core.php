<?php
include "DB.php";
include"core/auth_function.php";


if(!auth()){
        include('view/head.php');
        include('view/no_logged.php');
        die();
}else{

    $login = $_SESSION['login'];
    if (isset($_GET['id'])){
        $idRecipient = $_GET['id'];
    }

    $recipient = getUserDATA($idRecipient);
    $userId = getUserID($login);
    $userData = getUserDATA($userId);
    if (isset($_GET['status'])){
        $status = $_GET['status'];
        if ($status == 2) {
            $err_message = "ОШИБКА!!! Сообщение не отправлено";
        }
    }

    $sql = "SELECT idSender, idRecipient FROM `messages` WHERE idSender='".$userId."' GROUP BY idRecipient";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $talkers[] = getUserDATA($row['idRecipient']);
    }

    $sql = "SELECT idSender, idRecipient FROM `messages` WHERE idRecipient='".$userId."' GROUP BY idSender";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        foreach ($talkers as $key => $value) {
            if ($value['idUser'] == $row['idSender']) {
                break;
            } else {
                if ($key == count($talkers)){
                    $talkers[] = getUserDATA($row['idSender']);
                }
            }
        }
    }  
    if (isset($_GET['id'])){
        $sql = "SELECT * FROM `messages` WHERE (idSender='".$userId."' AND idRecipient='".$idRecipient ."' ) OR (idSender='".$idRecipient."' AND idRecipient='".$userId ."' ) order BY createDate";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $messages[] = $row;
        }  
        foreach ($messages as $key => &$message) {
            if ($message['idSender'] == $userId){
                $message['avatar'] = $userData['avatar'];
            } else{
                $message['avatar'] = $recipient['avatar'];
            }
        }
    }
    // echo "<pre>";
    // print_r($messages);
}
?>