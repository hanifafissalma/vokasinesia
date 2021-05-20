<?php
include("include/m.i.s.c.php");
if($_GET)
{
    delUpload($_GET['id']);
    header("Location:library-upload-n-ds");
}
?>