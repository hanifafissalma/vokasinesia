<?php
include("include/m.i.s.c.php");
if($_GET)
{
    delpackage($_GET['id']);
    header("Location:package-n-ds");
}
?>