<?php include "include/m.i.s.c.php"; ?>
<?php if($_SESSION['level']==2) header("Location:blank"); ?>
<?php include "include/header.php"; ?>
<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>
        <?php $data = getAllSurvey(); ?>
        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ns")): 
            $notification = '<div class="alert alert-success">   
                Penambahan survey baru sukses.
            </div>';
        elseif(isset($_GET['notif'])&&($_GET['notif']=="cs")): 
            $notification = '<div class="alert alert-success">   
                Penutupan survey sukses.
            </div>';
        endif;?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Survey</h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <?= $notification ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-survey">
                                <thead>
                                    <tr>
                                        <th width="40%">Judul Survey</th>
                                        <th width="40%">Keterangan</th>
                                        <th width="10%">Status</th>
                                        <th width="10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0;$i<sizeof($data);$i++): ?>
                                    <tr>
                                        <td><?= $data[$i]['judul'] ?></td>
                                        <td><?= $data[$i]['keterangan'] ?></td>
                                        <td class="text-center"><?= statusSurvey($data[$i]['status']) ?></td>
                                        <td class="text-center">
                                            <?php if(roleActivate("role_read", $permissionSurvey)):?>
                                            <a href="survey-view-<?= $data[$i]['id'] ?>"><i class="fa fa-eye"></i></a>
                                            <?php endif; ?>
                                            <?php if(roleActivate("role_delete", $permissionSurvey)):
                                                echo '<a href="do.closesurvey-'.$data[$i]['id'].'" onclick="return confirm(\'Apakah Anda yakin untuk menutup survey ini?\');" class="text-danger" style="margin-left:1em"><i class="fa fa-ban"></i></a>';
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
