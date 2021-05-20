<?php include "include/m.i.s.c.php"; ?>
<?php if($_SESSION['level']==2) header("Location:blank"); ?>
<?php include "include/header.php"; ?>
<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>
        <?php $data = allCategory(); ?>
        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ds")): 
            $notification = '<div class="alert alert-success">   
                Hapus data sukses.
            </div>';
        elseif(isset($_GET['notif'])&&($_GET['notif']=="ns")): 
            $notification = '<div class="alert alert-success">   
                Penambahan data baru sukses.
            </div>';
        elseif(isset($_GET['notif'])&&($_GET['notif']=="nx")): 
            $notification = '<div class="alert alert-danger">   
                Penambahan data baru gagal. Nama kategori sudah ada.
            </div>';
        endif;?>
        <style type="text/css">
            .catImage{
                width:100%;
                height:auto;
            }
        </style>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Kategori</h1>
                    </div>
                </div>                              
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <?= $notification ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="">
                                <thead>
                                    <tr>
                                        <!--<th width="10%">Id</th>-->
                                        <th width="30%" class="text-center">Nama Kategori</th>
                                        <th width="40%" class="text-center">Image</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php for($i=0;$i<sizeof($data);$i++): ?>
                                    <tr>
                                        <!--<td><?= $data[$i]['id'] ?></td>-->
                                        <td class="text-center"><?= $data[$i]['category_name'] ?></td>
                                        <td class="text-center">
                                            <?php if($data[$i]['img']!=""):?>
                                            <img class="catImage" src="<?= BASE_HREF2 ?>/images/post/<?= $data[$i]['img'] ?>">
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center"><a href="category-edit-<?= $data[$i]['id'] ?>"><i class="fa fa-edit"></i></a><a href="category-delete-<?= $data[$i]['id'] ?>" onclick="return confirm('Apakah Anda yakin untuk menghapus?');" title="Hapus" class="text-danger" style="margin-left:1em"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                <?php  endfor  ?>
                                </tbody>
                            </table>                          
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
