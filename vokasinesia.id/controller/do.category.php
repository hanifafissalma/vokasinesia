<?php
include("include/m.i.s.c.php");

if($_POST)
{
    if($_POST['act']=="new")
    {
        $id = createNewCategory($_POST);
        if($id>0){
            header("Location:category-n-ns");
        }
        elseif ($id==0) {
            header("Location:category-n-nx");
        }
    }
    elseif($_POST['act']=="edit")
    {
        if(editCategory($_POST)==true){
            header("Location:category-edit-".$_POST['id']."-s");
        }
        elseif(editCategory($_POST)==false){
            header("Location:category-edit-".$_POST['id']."-x");
        }
    }
}
?>