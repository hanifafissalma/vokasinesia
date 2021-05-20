<?php
include("include/m.i.s.c.php");

if($_POST)
{
    editpengaturanumum($_POST);
    header("Location:pengaturan-umum");
}
?>