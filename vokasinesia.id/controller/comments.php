<?php include "include/m.i.s.c.php"; ?>
<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>
        <?php $data = allcomments(); ?>
        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ds")): 
            $notification = '<div class="alert alert-success">   
                Hapus data sukses.
            </div>';
        elseif(isset($_GET['notif'])&&($_GET['notif']=="as")): 
            $notification = '<div class="alert alert-success">   
                Approve data sukses.
            </div>';
        endif;?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Komentar</h1>
                    </div>
                </div>
                                                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                    <?= $notification ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="komentar">
                                <thead>
                                    <tr>
                                        <th width="10%">Nama</th>
                                        <th width="10%">Email</th>
                                        <th width="30%">Isi Komentar</th>
                                        <th width="35%">Judul Post</th>
                                        <th width="10%" class="text-center">Tanggal</th>
                                        <th width="5%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php for($i=0;$i<sizeof($data);$i++): ?>
                                    <?php $postdetail = detailpost($data[$i]['post_id']); ?>
                                    <tr>
                                        <td><?= $data[$i]['nama'] ?></td>
                                        <td><?= $data[$i]['email'] ?></td>
                                        <td><?= $data[$i]['text_comment'] ?></td>
                                        <td><?= $postdetail['post_title'] ?></td>
                                        <td><?= $data[$i]['created_at'] ?></td>
                                        <td class="text-center">
                                            <?php if($data[$i]['status']==0):?>
                                                <?php if(roleActivate("role_write", $permissionComment)):?>
                                                <a href="post-approve-komentar-<?= $data[$i]['id'] ?>" onclick="return confirm('Apakah Anda yakin untuk approve komentar ini?');" title="Approve" class="text-danger" style="margin-left:1em"><i class="glyphicon glyphicon-ok-circle text-success"></i></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(roleActivate("role_delete", $permissionComment)):?>
                                            <a href="post-delete-komentar-<?= $data[$i]['id'] ?>" onclick="return confirm('Apakah Anda yakin untuk menghapus?');" title="Hapus" class="text-danger" style="margin-left:1em"><i class="fa fa-trash"></i></a>
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
