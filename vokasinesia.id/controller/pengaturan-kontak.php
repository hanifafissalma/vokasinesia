<?php include "include/m.i.s.c.php"; ?>
<?php if($_SESSION['level']==2) header("Location:blank"); ?>
<?php include "include/header.php"; ?>

<body>
<script>
    function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
<style type="text/css">
    #image-preview{
        display:none;
        width : 150px;
        height : auto;
    }
</style>
    <div id="wrapper">

        <?php include "include/navigation.php"; ?>        

        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="s")): 
            $notification = '<div class="alert alert-success">   
                Ubah data user sukses.
            </div>';
        elseif (isset($_GET['notif'])&&($_GET['notif']=='f')):
            $notification = '<div class="alert alert-danger">
                Periksa kembali data Anda.
            </div>';
        endif; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pengaturan Kontak</h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form" action="do.pengaturan.kontak.php" method="post" enctype="multipart/form-data">
                        
                            <?= $notification ?>
                            <?php $data = getcontactsettings(); ?>
                    
                            <div class="form-group">
                                <label>Company Name</label>
                                <input class="form-control" name="company_name" value="<?= $data['company_name'] ?>" placeholder="Tulis nama perusahaan" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" rows="5" placeholder="Tulis alamat kantor" required><?= $data['address'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Display Email Address</label>
                                <input type="text" class="form-control" name="display_email" value="<?= $data['display_email'] ?>" placeholder="Tulis alamat email (untuk display)" required>
                            </div>
                            <div class="form-group">
                                <label>Contact Form Email Address</label>
                                <input type="text" class="form-control" name="form_email" value="<?= $data['form_email'] ?>"  placeholder="Tulis alamat email (untuk form Contact Us)" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone" value="<?= $data['phone'] ?>"  placeholder="Tulis nomor kontak" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Facebook Account</label>
                                <input type="text" class="form-control" name="facebook" value="<?= $data['facebook'] ?>"   placeholder="Masukan akun Facebook">
                            </div>
                            <div class="form-group">
                                <label>Instagram Account</label>
                                <input type="text" class="form-control" name="instagram" value="<?= $data['instagram'] ?>"  placeholder="Masukan akun Instagram">
                            </div>
                            <div class="form-group">
                                <label>Twitter Account</label>
                                <input type="text" class="form-control" name="twitter" value="<?= $data['twitter'] ?>"  placeholder="Masukan akun Twitter">
                            </div>
                            <div class="form-group">
                                <label>Youtube Account</label>
                                <input type="text" class="form-control" name="youtube" value="<?= $data['youtube'] ?>"  placeholder="Masukan akun Youtube">
                            </div>
                            <hr>
                            <?php if(roleActivate("role_write", $permissionPengaturan)):?>
                            <button type="submit" class="btn btn-primary">Simpan Pengaturan Kontak</button>
                            <?php endif; ?>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
