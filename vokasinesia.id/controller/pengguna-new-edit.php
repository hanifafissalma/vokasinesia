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
                Penambahan user baru sukses.
            </div>';
        elseif(isset($_GET['notif'])&&($_GET['notif']=="s")): 
            $notification = '<div class="alert alert-success">   
                Ubah data user sukses.
            </div>';
        elseif (isset($_GET['notif'])&&($_GET['notif']=='f')):
            $notification = '<div class="alert alert-danger">
                Periksa kembali data Anda.
            </div>';
        elseif (isset($_GET['notif'])&&($_GET['notif']=='fu')):
            $notification = '<div class="alert alert-danger">
                Email sudah terdaftar.
            </div>';
        elseif (isset($_GET['notif'])&&($_GET['notif']=='fp')):
            $notification = '<div class="alert alert-danger">
                Password harus memenuhi Minimal 8 karakter dan terdiri dari minimal 1 huruf besar, 1 huruf kecil, 1 angka, dan 1 karakter khusus.
            </div>';
        endif; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo ($_GET['act']=='new'?'Tambah Pengguna Baru':'Ubah Data Pengguna'); ?></h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form" action="do.pengguna.php" method="post" enctype="multipart/form-data">
                            <?php if ($_GET['act']=='edit'): ?>
                                <input type="hidden" name="act" value="edit">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <?php $data = getDetailPengguna($_GET['id']); ?>
                            <?php elseif ($_GET['act']=='new'): ?>
                                <input type="hidden" name="act" value="new">
                            <?php endif; ?>

                            <?= $notification ?>
                            
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukan nama lengkap pengguna" value="<?php echo ($_GET['act']=='new'?'':$data['nama']); ?>"  required>
                            </div>
                            <div class="form-group">
                                <label>Email Pengguna</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukan alamat email pengguna" value="<?php echo ($_GET['act']=='new'?'':$data['email']); ?>"  required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Tambahan</label>
                                <textarea class="form-control" rows="5" name="keterangan" placeholder="Tulis keterangan tambahan pengguna"><?php echo ($_GET['act']=='new'?'':$data['keterangan']); ?></textarea>
                            </div>
                            <div class="form-group showpassword2">
                                <label>Set Password</label>
                                <input type="password" class="form-control" id="password" name="passwd" placeholder="Masukan password baru">
                                <i class="fa fa-eye" id="togglePassword"></i>
                                <script>
									const togglePassword = document.querySelector("#togglePassword");
									const password = document.querySelector("#password");
									togglePassword.addEventListener("click", function (e) {
										const type = password.getAttribute("type") === "password" ? "text" : "password";
										password.setAttribute("type", type);
										this.classList.toggle("fa-eye-slash");
									});
								</script>
                                <small>Password harus memenuhi Minimal 8 karakter dan terdiri dari minimal 1 huruf besar, 1 huruf kecil, 1 angka, dan 1 karakter khusus.<br>
                                <!--Jika dikosongkan maka password akan tergenerate secara otomatis dan dikirimkan ke email pengguna baru.--></small>
                            </div>
                            <div class="form-group">
                                <label>Role Pengguna</label>
                                <select class="form-control" name="role_id" required>
                                    <option value="" disabled selected>Pilih Role Pengguna</option>
                                    <?php
                                    $roles = allGroupPengguna();
                                    for($a=0;$a<sizeof($roles);$a++):?>
                                    <option value="<?= $roles[$a]['id'] ?>" <?php 
                                    if($_GET['act']=='edit') 
                                        { 
                                            if($data['role_id']==$roles[$a]['id']) { echo 'selected'; }
                                        }?>><?= $roles[$a]['nama_group'] ?></option>
                                    <?php endfor;?>
                                </select>
                            </div>
                            <hr>
                            <input type="hidden" name="status" value="1">
                            <?php if($data['level']==2): ?>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>                                        
                                        <input type="checkbox" value="2" name="status" <?php echo ($_GET['act']=='new'?'':suspendchecked($data['status'])); ?>><strong>Pengguna Suspend</strong>
                                    </label>
                                </div>
                            </div>
                            <?php endif;?>
                            <hr>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
