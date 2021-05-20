<?php
include("include/m.i.s.c.php");

if($_GET)
{
    urutan($_GET);
    if($_GET['table']=="post"):
    	header("Location:all-static-all");
    endif;    
}
?>