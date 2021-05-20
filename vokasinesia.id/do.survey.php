<?php
include("include/m.i.s.c.php");

if($_POST)
{
    $id = postSurvey($_POST);
    header("Location:./");
}
?>