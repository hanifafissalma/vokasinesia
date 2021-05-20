<?php
include("include/m.i.s.c.php");



if($_POST)
{
    if($_POST['act']=="new")
    {
        $id = createGroupPengguna($_POST);
        if($id>0):
            header("Location:group-pengguna-edit-".$id."-np");
        endif;
    }
    elseif($_POST['act']=="edit")
    {
        $a = editGroupPengguna($_POST);
        
        if($a==1):
            header("Location:group-pengguna-edit-".$_POST['id']."-s");
        elseif($a==0):
            header("Location:group-pengguna-edit-".$_POST['id']."-fp");
        endif;
    }
}
?>