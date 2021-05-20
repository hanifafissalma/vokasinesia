<?php
include("include/m.i.s.c.php");

if($_POST)
{
    createSurvey($_POST);
    header("Location:survey-ns");
}
?>