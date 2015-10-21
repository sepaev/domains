<?php
require_once "autoload.php";

define("SITE", "http://prof2/MVC/");

$loader = new core\system\Routing();
$loader-> loadPage();
?>