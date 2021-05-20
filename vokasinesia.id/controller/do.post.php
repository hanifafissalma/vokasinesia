<?php
include("include/m.i.s.c.php");

if($_POST)
{
    if($_POST['act']=="new")
    {
        $result = createnewpost($_POST);
        if($result[1]==1):
            if($result[0]>0):
                $id = $result[0];
                if($_POST['type']=="data"):
                    if($_POST['subtype']!='slide'):
                        header("Location:edit-".$_POST['type']."/".$id."-ns");
                    elseif($_POST['subtype']=='slide'):
                        header("Location:edit-".$_POST['type']."-slide/".$id."-ns");
                    endif;
                elseif($_POST['type']=="static"):
                    header("Location:edit-".$_POST['type']."/".$id."-ns");
                endif;
            endif;
        else:
            header("Location:../preview/".$result[2]);
        endif;
    }
    elseif($_POST['act']=="edit")
    {
        $result = editpost($_POST);
        if($result[1]==1):
            if($_POST['type']=="data"):
                if($_POST['subtype']!='slide'):
                    header("Location:edit-".$_POST['type']."/".$_POST['id']."-s");
                elseif($_POST['subtype']=='slide'):
                    header("Location:edit-".$_POST['type']."-slide/".$_POST['id']."-s");
                endif;
            elseif($_POST['type']=="static"):
                header("Location:edit-".$_POST['type']."/".$_POST['id']."-s");
            endif;
        else:
           header("Location:../preview/".$result[2]);
        endif;
    }
}
?>