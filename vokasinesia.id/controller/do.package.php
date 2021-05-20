<?php
include("include/m.i.s.c.php");

if($_POST)
{
    if($_POST['act']=="new")
    {
        $id = createnewpaket($_POST);
        if($id>0) header("Location:package-edit-".$id."-ns");
    }
    elseif($_POST['act']=="edit")
    {
        if(editpaket($_POST)){
            header("Location:package-edit-".$_POST['id']."-s");
        }
    }
}
?>