<?php
include("include/m.i.s.c.2.php");

if($_POST)
{
    if(resetPasswd($_POST['email'])==true):
        header("Location:login-rs");
    elseif(resetPasswd($_POST['email'])==false):
        header("Location:login-wr");
    endif;
}
?>