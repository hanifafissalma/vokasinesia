<?php
include("include/m.i.s.c.php");
$pKontak  = getContactSettings();
if($_POST)
{
	$_POST['emailvokasinesia'] = $pKontak['display_email'];
    contactemail($_POST);
    header("Location:./s");
}
?>