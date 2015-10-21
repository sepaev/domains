<?php
session_start();

require_once "autoload.php";

define("SITE", "http://work/");

$loader = new core\system\Routing();
$loader-> loadPage();


//include "config.php";
//include_once "core/routing.php";
//loadPage();

?>