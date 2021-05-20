<?php
include("include/m.i.s.c.php");
if($_GET)
{
    doCloseSurvey($_GET['id']);
    header("Location:survey-cs");
}
?>