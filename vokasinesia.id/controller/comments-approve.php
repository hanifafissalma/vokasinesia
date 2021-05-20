<?php
include("include/m.i.s.c.php");
if($_GET)
{
    approveComment($_GET['id']);
    header("Location:comments-as");
}
?>