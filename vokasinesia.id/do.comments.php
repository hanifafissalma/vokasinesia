<?php
include("include/m.i.s.c.php");

if($_POST)
{
    $id = createnewcomments($_POST);
    if($id>0) header("Location:".$_POST['type']."/".$_POST['slug']."/s");
}
?>