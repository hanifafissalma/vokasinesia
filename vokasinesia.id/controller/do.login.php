<?php
include("include/m.i.s.c.2.php");

if($_POST)
{
    $login = login($_POST['email'], $_POST['passwd'], $_POST['remember']);

    if($login[0]>0)
    {
        $_SESSION = $login[1];
        header("Location:dashboard");
    }
    elseif($login[0]==0)
    {
        if($login[1]==0)
        {
            $x=md5(rand(5, 15));
            header("Location:login-nu");
        }
        elseif($login[1]==1)
        {
            $x=md5(rand(5, 15));
            header("Location:login-wp");
        }  
        elseif($login[1]==2)
        {
            $x=md5(rand(5, 15));
            header("Location:login-sp");
        }         
    }
}
?>