<?php
include("include/m.i.s.c.php");
if($_GET)
{
    delcomment($_GET['id']);
    header("Location:comments-ds");
}
?>