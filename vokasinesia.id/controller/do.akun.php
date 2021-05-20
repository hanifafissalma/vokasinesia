<?php
include("include/m.i.s.c.php");

if($_POST)
{
    $a = editpengguna($_POST);
    if($a==1):
        header("Location:pengaturan-akun-s");
    elseif($a==0):
        header("Location:pengaturan-akun-fp");
    endif;
}
?>