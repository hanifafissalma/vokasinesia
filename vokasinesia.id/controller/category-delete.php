<?php
include("include/m.i.s.c.php");
if($_GET)
{
    delCategory($_GET['id']);
    header("Location:category-n-ds");
}
?>