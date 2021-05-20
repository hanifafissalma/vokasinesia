<?php
include("include/m.i.s.c.php");
if($_GET)
{
    dodeletegroupuser($_GET['id']);
    header("Location:group-pengguna-ds");
}
?>