<?php include "include/m.i.s.c.php"; ?>
<?php if($_SESSION['level']==2) header("Location:blank"); ?>
<?php include "include/header.php"; ?>
<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>
        <?php $data = getAllPengguna(); ?>
        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ds")): 
            $notification = '<div class="alert alert-success">   
                Suspend pengguna sukses.
            </div>';
        endif;?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Pengguna</h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <?= $notification ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
                                <thead>
                                    <tr>
                                        <th width="40%">Nama Pengguna</th>
                                        <th width="40%">Email</th>
                                        <th width="10%">Status</th>
                                        <th width="10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0;$i<sizeof($data);$i++): ?>
                                    <tr>
                                        <td><?= $data[$i]['nama'] ?></td>
                                        <td><?= $data[$i]['email'] ?></td>
                                        <td class="text-center"><?= status($data[$i]['status']) ?></td>
                                        <td class="text-center">
                                            <?php if(roleActivate("role_write", $permissionPengguna)):?>
                                            <a href="pengguna-edit-<?= $data[$i]['id'] ?>"><i class="fa fa-edit"></i></a>
                                            <?php endif; ?>
                                            <?php if(roleActivate("role_delete", $permissionPengguna)):
                                                echo '<a href="do.deleteuser-'.$data[$i]['id'].'" onclick="return confirm(\'Apakah Anda yakin untuk men-delete user ini?\');" title="Hapus" class="text-danger" style="margin-left:1em"><i class="fa fa-trash"></i></a>';
                                            endif;
                                            ?></td>
                                    </tr>
                                <?php endfor ?>
                                </tbody>
                            </table>                          
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
