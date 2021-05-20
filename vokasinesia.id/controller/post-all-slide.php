<?php include "include/m.i.s.c.php"; ?>
<?php include "include/header.php"; ?>

<body>
    <style type="text/css">
            .catImage{
                width:100%;
                height:auto;
            }
        </style>
    <div id="wrapper">

        <?php include "include/navigation.php"; ?>
        <?php $data = allSlide(); ?>
        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ds")): 
            $notification = '<div class="alert alert-success">   
                Hapus data sukses.
            </div>';
        endif;?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Slide</h1>
                    </div>
                </div>
                                                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                    <?= $notification ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="60%">Judul</th>
                                        <th width="15%">Gambar</th>
                                        <th width="15%" class="text-center">Tanggal</th>
                                        <th width="5%" class="text-center">Status</th>
                                        <th width="5%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php for($i=0;$i<sizeof($data);$i++): ?>
                                    <tr>
                                        <td><?= $data[$i]['post_title'] ?></td>
                                        <td><?php if($data[$i]['img']!=""):?>
                                            <img class="catImage" src="<?= BASE_HREF2 ?>/images/post/<?= $data[$i]['img'] ?>">
                                            <?php endif; ?></td>
                                        <td><?= $data[$i]['tgl_create'] ?></td>
                                        <td class="text-center"><?= status($data[$i]['status']) ?></td>
                                        <td class="text-center"><a href="edit-data-slide/<?= $data[$i]['id'] ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                            <?php if(roleActivate("role_delete", $permissionSlide)):?>
                                                <a href="post-delete-data-slide-<?= $data[$i]['id'] ?>" onclick="return confirm('Apakah Anda yakin untuk menghapus?');" title="Hapus" class="text-danger" style="margin-left:1em"><i class="fa fa-trash"></i></a>
                                            <?php endif; ?>
                                            </td>
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
