<?php include "include/m.i.s.c.php"; ?>
<?php if($_SESSION['level']==2) header("Location:blank"); ?>
<?php include "include/header.php"; ?>
<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>
        <?php $data = allGroupPengguna(); ?>
        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ds")): 
            $notification = '<div class="alert alert-success">   
                Hapus group pengguna sukses.
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
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="5%">Nomor</th>
                                        <th width="40%">Nama Group</th>
                                        <th width="10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0;$i<sizeof($data);$i++): ?>
                                    <tr>
                                        <td><?= ($i+1) ?></td>
                                        <td><?= $data[$i]['nama_group'] ?></td>
                                        <td class="text-center">
                                            <?php if(roleActivate("role_write", $permissionGroup)):?>
                                            <a href="group-pengguna-edit-<?= $data[$i]['id'] ?>"><i class="fa fa-edit"></i></a>
                                            <?php endif; ?>
                                        </td>
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
