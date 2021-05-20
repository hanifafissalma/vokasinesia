<?php
include("include/m.i.s.c.php");

if($_POST)
{
    if($_POST['act']=="new")
    {
        $id = createnewUpload($_POST);
        if($id>0) header("Location:library-upload-n-ns");
    }
    elseif($_POST['act']=="edit")
    {
        if(editUpload($_POST)){
            header("Location:library-upload-edit-".$_POST['id']."-s");
        }
    }
}
?>