<?php
include("include/m.i.s.c.php");



if($_POST)
{
    if($_POST['act']=="new")
    {
        $id = createpengguna($_POST);
        if($id>0):
            header("Location:pengguna-edit-".$id."-ns");
        elseif($id==-1):
            header("Location:pengguna-new-fp");
        elseif($id==0):
            header("Location:pengguna-new-fu");
        endif;
    }
    elseif($_POST['act']=="edit")
    {
        $a = editpengguna($_POST);
        
        if($a==1):
            header("Location:pengguna-edit-".$_POST['id']."-s");
        elseif($a==0):
            header("Location:pengguna-edit-".$_POST['id']."-fp");
        endif;
    }
}
?>