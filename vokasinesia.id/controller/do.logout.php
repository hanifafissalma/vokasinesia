<?php
include("include/m.i.s.c.php");
session_start();
session_unset();
session_destroy();
if(isset($_COOKIE['cookielogin']))      
{
$time = time();
    setcookie("email", $time - 3600);
    setcookie("passwd", $time - 3600);
}

	header("Location:login-lg");

?>
