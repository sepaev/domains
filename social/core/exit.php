<?php
session_destroy();
setcookie("auth","true",1);
setcookie("login","no",1);
setcookie("token","",1);
header ("location:".SITE."main");
?>