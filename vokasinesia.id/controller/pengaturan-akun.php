<?php include "include/m.i.s.c.php"; ?>
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
                        <h1 class="page-header">Pengaturan Akun</h1>
                    </div>
                </div>                           
                
                <div class="row" style="margin-bottom:5em;">                    
                    <div class="col-lg-12">
                        <form role="form" action="do.akun.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                <?php $data = getDetailPengguna($_SESSION['id']); ?>
                                <?= $notification ?>
                    
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email Pengguna</label>
                                <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Tambahan</label>
                                <textarea class="form-control" name="keterangan" rows="5"><?= $data['keterangan'] ?></textarea>
                            </div>
                            <div class="form-group showpassword2">
                                <label>Set Password</label>
                                <input type="password" name="passwd" class="form-control" id="password">
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
                                <small>Password harus memenuhi Minimal 8 karakter dan terdiri dari minimal 1 huruf besar, 1 huruf kecil, 1 angka, dan 1 karakter khusus.</small>
                            </div>
                            <hr>
                            <input type="hidden" name="status" value="1">
                            <button type="submit" class="btn btn-primary">Simpan Data Pengguna</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
