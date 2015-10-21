<?php
include_once "DB.php";
include_once "core/functions.php";

$login = $_SESSION['login'];
$userId = getUserID($login);
$friends = frendList($userId);

?>

