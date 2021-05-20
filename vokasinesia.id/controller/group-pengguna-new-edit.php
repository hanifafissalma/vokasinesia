<?php include "include/m.i.s.c.php"; ?>
<?php if($_SESSION['level']==2) header("Location:blank"); ?>
<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>

        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ns")): 
            $notification = '<div class="alert alert-success">   
                Penambahan group user baru sukses.
            </div>';
        elseif(isset($_GET['notif'])&&($_GET['notif']=="s")): 
            $notification = '<div class="alert alert-success">   
                Ubah data group user sukses.
            </div>';
        endif; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo ($_GET['act']=='new'?'Tambah Group Pengguna Baru':'Ubah Group Pengguna'); ?></h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form" action="do.group-pengguna.php" method="post" enctype="multipart/form-data">
                            <?php if ($_GET['act']=='edit'): ?>
                                <input type="hidden" name="act" value="edit">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <?php $data = getGroupPengguna($_GET['id']); ?>
                                <?php $role = getAllRole($data['id']); ?>
                            <?php elseif ($_GET['act']=='new'): ?>
                                <input type="hidden" name="act" value="new">
                            <?php endif; ?>

                            <?= $notification ?>
                            
                            <div class="form-group">
                                <label>Nama Group Pengguna</label>
                                <input type="text" class="form-control" name="nama_group" placeholder="Masukan nama group pengguna" value="<?php echo ($_GET['act']=='new'?'':$data['nama_group']); ?>"  required>
                            </div>
                            <div class="form-group">
                                <label>Post</label>
                                <div class="checkbox">
                                    <input type="hidden" name="post_read" value="0">
                                    <input type="hidden" name="post_write" value="0">
                                    <input type="hidden" name="post_delete" value="0">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="post_read" <?php echo ($_GET['act']=='new'?'':checked(1, $role['post']['role_read'])); ?>><strong>Tambah/Ubah</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="post_write" <?php echo ($_GET['act']=='new'?'':checked(1, $role['post']['role_write'])); ?>><strong>Publikasi</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="post_delete" <?php echo ($_GET['act']=='new'?'':checked(1, $role['post']['role_delete'])); ?>><strong>Hapus</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Slide</label>
                                <div class="checkbox">
                                    <input type="hidden" name="slide_read" value="0">
                                    <input type="hidden" name="slide_write" value="0">
                                    <input type="hidden" name="slide_delete" value="0">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="slide_read" <?php echo ($_GET['act']=='new'?'':checked(1, $role['slide']['role_read'])); ?>><strong>Tambah/Ubah</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="slide_write" <?php echo ($_GET['act']=='new'?'':checked(1, $role['slide']['role_write'])); ?>><strong>Publikasi</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="slide_delete" <?php echo ($_GET['act']=='new'?'':checked(1, $role['slide']['role_delete'])); ?>><strong>Hapus</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Komentar</label>
                                <div class="checkbox">
                                    <input type="hidden" name="comment_read" value="0">
                                    <input type="hidden" name="comment_write" value="0">
                                    <input type="hidden" name="comment_delete" value="0">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="comment_read" <?php echo ($_GET['act']=='new'?'':checked(1, $role['comment']['role_read'])); ?>><strong>Baca</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="comment_write" <?php echo ($_GET['act']=='new'?'':checked(1, $role['comment']['role_write'])); ?>><strong>Approve</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="comment_delete" <?php echo ($_GET['act']=='new'?'':checked(1, $role['comment']['role_delete'])); ?>><strong>Hapus</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Kategori</label>
                                <div class="checkbox">
                                    <input type="hidden" name="category_read" value="0">
                                    <input type="hidden" name="category_write" value="0">
                                    <input type="hidden" name="category_delete" value="0">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="category_read" <?php echo ($_GET['act']=='new'?'':checked(1, $role['category']['role_read'])); ?>><strong>Baca</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="category_write" <?php echo ($_GET['act']=='new'?'':checked(1, $role['category']['role_write'])); ?>><strong>Tambah/Ubah</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="category_delete" <?php echo ($_GET['act']=='new'?'':checked(1, $role['category']['role_delete'])); ?>><strong>Hapus</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Survey</label>
                                <div class="checkbox">
                                    <input type="hidden" name="survey_read" value="0">
                                    <input type="hidden" name="survey_write" value="0">
                                    <input type="hidden" name="survey_delete" value="0">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="survey_read" <?php echo ($_GET['act']=='new'?'':checked(1, $role['survey']['role_read'])); ?>><strong>Baca</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="survey_write" <?php echo ($_GET['act']=='new'?'':checked(1, $role['survey']['role_write'])); ?>><strong>Tambah</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="survey_delete" <?php echo ($_GET['act']=='new'?'':checked(1, $role['survey']['role_delete'])); ?>><strong>Hapus</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Group Pengguna</label>
                                <div class="checkbox">
                                    <input type="hidden" name="grouppengguna_read" value="0">
                                    <input type="hidden" name="grouppengguna_write" value="0">
                                    <input type="hidden" name="grouppengguna_delete" value="0">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="grouppengguna_read" <?php echo ($_GET['act']=='new'?'':checked(1, $role['grouppengguna']['role_read'])); ?>><strong>Baca</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="grouppengguna_write" <?php echo ($_GET['act']=='new'?'':checked(1, $role['grouppengguna']['role_write'])); ?>><strong>Ubah/Tambah</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Pengguna</label>
                                <div class="checkbox">
                                    <input type="hidden" name="pengguna_read" value="0">
                                    <input type="hidden" name="pengguna_write" value="0">
                                    <input type="hidden" name="pengguna_delete" value="0">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="pengguna_read" <?php echo ($_GET['act']=='new'?'':checked(1, $role['pengguna']['role_read'])); ?>><strong>Baca</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="pengguna_write" <?php echo ($_GET['act']=='new'?'':checked(1, $role['pengguna']['role_write'])); ?>><strong>Ubah/Tambah</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="pengguna_delete" <?php echo ($_GET['act']=='new'?'':checked(1, $role['pengguna']['role_delete'])); ?>><strong>Hapus</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Pengaturan</label>
                                <div class="checkbox">
                                    <input type="hidden" name="pengaturan_read" value="0">
                                    <input type="hidden" name="pengaturan_write" value="0">
                                    <input type="hidden" name="pengaturan_delete" value="0">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="pengaturan_read" <?php echo ($_GET['act']=='new'?'':checked(1, $role['pengaturan']['role_read'])); ?>><strong>Baca</strong>
                                    </label>
                                    <label>                                        
                                        <input type="checkbox" value="1" name="pengaturan_write" <?php echo ($_GET['act']=='new'?'':checked(1, $role['pengaturan']['role_write'])); ?>><strong>Ubah</strong>
                                    </label>
                                </div>
                            </div>                            
                            <hr>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
