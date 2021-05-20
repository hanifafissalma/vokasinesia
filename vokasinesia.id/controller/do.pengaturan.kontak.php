<?php
include("include/m.i.s.c.php");

if($_POST)
{
    editcontactsettings($_POST);
    header("Location:pengaturan-kontak");
}
?>