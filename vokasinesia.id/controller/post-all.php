<?php include "include/m.i.s.c.php"; ?>
<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>
        <?php $data = allpost($_GET['type']); ?>
        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ds")): 
            $notification = '<div class="alert alert-success">   
                Hapus data sukses.
            </div>';
        endif;?>

        <?php if ($_GET['type']=='data'): ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Post</h1>
                    </div>
                </div>
                                                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                    <?= $notification ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="55%">Judul</th>
                                        <th width="15%">Kategori</th>
                                        <th width="15%" class="text-center">Tanggal</th>
                                        <th width="15%" class="text-center">Author</th>
                                        <th width="10%" class="text-center">Status</th>
                                        <th width="5%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php for($i=0;$i<sizeof($data);$i++): ?>
                                    <?php $pengguna = getDetailPengguna($data[$i]['creator_id']); ?>
                                    <tr>
                                        <td><?= $data[$i]['post_title'] ?></td>
                                        <td><?= $data[$i]['subtype'] ?></td>
                                        <td><?= $data[$i]['tgl_create'] ?></td>
                                        <td><?= $pengguna['nama'] ?></td>
                                        <td class="text-center"><?= status($data[$i]['status']) ?></td>
                                        <td class="text-center"><a href="edit-data/<?= $data[$i]['id'] ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                            <?php if(roleActivate("role_delete", $permissionPost)):?>
                                            <a href="post-delete-data-<?= $data[$i]['id'] ?>" onclick="return confirm('Apakah Anda yakin untuk menghapus?');" title="Hapus" class="text-danger" style="margin-left:1em"><i class="fa fa-trash"></i></a>
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
        <?php endif ?>

        <?php if ($_GET['type']=='static'): ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Halaman Statis <? $_GET['subtype'] ?></h1>
                    </div>
                </div>
                                            
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <?= $notification ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="">
                                <thead>
                                    <tr>
                                        <th width="60%">Judul Halaman Statis</th>
                                        <th width="15%" class="text-center">Tanggal</th>
                                        <th width="10%" class="text-center">Status</th>
                                        <th width="10%" class="text-center">Location Menu</th>
                                        <th width="10%" class="text-center">Sort</th>
                                        <th width="15%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0;$i<sizeof($data);$i++): ?>
                                    <?php 
                                    if(($data[$i]['header']==1)&&($data[$i]['footer']==0)){
                                        $menuLocation = "Header";
                                    }
                                    elseif(($data[$i]['header']==0)&&($data[$i]['footer']==1)){
                                        $menuLocation = "Footer";
                                    }
                                    elseif(($data[$i]['header']==1)&&($data[$i]['footer']==1)){
                                        $menuLocation = "Header and Footer";
                                    }
                                    else{ $menuLocation = "";}
                                    ?>
                                    <tr>
                                        <td><?= $data[$i]['post_title'] ?></td>
                                        <td><?= $data[$i]['tgl_create'] ?></td>
                                        <td class="text-center"><?= status($data[$i]['status']) ?></td>
                                        <td class="text-center"><?= $menuLocation ?></td>
                                        <td class="text-center">
                                            <?php if( (($i-1)>=0) && (($i+1)>=sizeof($data))) :?>
                                                <a href="do.urutan.php?table=post&idnow=<?= $data[$i]['id'] ?>&urutannow=<?= $data[$i]['urutan'] ?>&idnew=<?= $data[($i-1)]['id'] ?>&urutannew=<?= $data[($i-1)]['urutan'] ?>"><i class="glyphicon glyphicon-arrow-up text-success"></i></a>
                                            <?php elseif( (($i-1)>=0) && (($i+1)<sizeof($data))) : ?>
                                                <a href="do.urutan.php?table=post&idnow=<?= $data[$i]['id'] ?>&urutannow=<?= $data[$i]['urutan'] ?>&idnew=<?= $data[($i-1)]['id'] ?>&urutannew=<?= $data[($i-1)]['urutan'] ?>"><i class="glyphicon glyphicon-arrow-up text-success"></i></a>
                                                <a href="do.urutan.php?table=post&idnow=<?= $data[$i]['id'] ?>&urutannow=<?= $data[$i]['urutan'] ?>&idnew=<?= $data[($i+1)]['id'] ?>&urutannew=<?= $data[($i+1)]['urutan'] ?>"><i class="glyphicon glyphicon-arrow-down text-danger"></i></a>
                                            <?php elseif( (($i-1)<0) && (($i+1)<=sizeof($data))) :?>
                                               <a href="do.urutan.php?table=post&idnow=<?= $data[$i]['id'] ?>&urutannow=<?= $data[$i]['urutan'] ?>&idnew=<?= $data[($i+1)]['id'] ?>&urutannew=<?= $data[($i+1)]['urutan'] ?>"><i class="glyphicon glyphicon-arrow-down text-danger"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center"><a href="edit-static-<?= $data[$i]['subtype'] ?>-<?= $data[$i]['id'] ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                            <?php if(roleActivate("role_delete", $permissionPost)):?>
                                            <a href="post-delete-static-<?= $data[$i]['subtype'] ?>-<?= $data[$i]['id'] ?>" onclick="return confirm('Apakah Anda yakin untuk menghapus?');" title="Hapus" class="text-danger" style="margin-left:1em"><i class="fa fa-trash"></i></a>
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
        <?php endif ?>

    </div>

<?php include "include/footer.php"; ?>
