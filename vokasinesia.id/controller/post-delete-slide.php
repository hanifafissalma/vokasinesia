<?php
include("include/m.i.s.c.php");
if($_GET)
{
    delpost($_GET['id']);
    header("Location:all-".$_GET['type']."-slide/ds");
}
?>