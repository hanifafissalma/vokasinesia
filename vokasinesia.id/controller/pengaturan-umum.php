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

  function previewImage2() {
    document.getElementById("image-preview2").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source2").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview2").src = oFREvent.target.result;
    };
  };

  function previewImage3() {
    document.getElementById("image-preview3").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source3").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview3").src = oFREvent.target.result;
    };
  };

  function previewImage4() {
    document.getElementById("image-preview4").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source4").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview4").src = oFREvent.target.result;
    };
  };
</script>
<style type="text/css">
    #image-preview{
        display:none;
        width : 150px;
        height : auto;
    }
    #image-preview2{
        display:none;
        width : 150px;
        height : auto;
    }
    #image-preview3{
        display:none;
        width : 150px;
        height : auto;
    }
    #image-preview4{
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
                        <h1 class="page-header">Pengaturan Umum</h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form" action="do.pengaturan.umum.php" method="post" enctype="multipart/form-data">
                        
                            <?= $notification ?>
                            <?php $data = getpengaturanumum(); ?>
                    
                            <div class="form-group">
                                <label>Judul Website</label>
                                <input type="text" class="form-control" name="title" value="<?= $data['title']; ?>" placeholder="Tulis Nama Website" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Website</label>
                                <textarea class="form-control" rows="5" name="description" placeholder="Tulis Deskripsi Website" required><?= $data['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kata Kunci / Keywords Website</label>
                                <input type="text" class="form-control" name="keywords" value="<?= $data['keywords']; ?>" placeholder="Tulis kata kunci website (pisahkan dengan koma)" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar Favicon</label>
                                <img id="image-preview" alt="image preview" <?php echo ($data['favicon']!=''?'src="'.BASE_HREF2.'images/post/'.$data['favicon'].'" style="display:block"':''); ?>>
                                <br/>
                                <input class="form-control" type="file" name="favicon" id="image-source" accept="image/*" onchange="previewImage();"/>
                            </div>
                            <div class="form-group">
                                <label>Gambar Social Media</label>
                                <img id="image-preview4" alt="image preview" <?php echo ($data['sosmed_image']!=''?'src="'.BASE_HREF2.'images/post/'.$data['sosmed_image'].'" style="display:block"':''); ?>>
                                <br/>
                                <input class="form-control" type="file" name="sosmed_image" id="image-source4" accept="image/*" onchange="previewImage4();"/>
                            </div>
                            <div class="form-group">
                                <label>Logo Wqrna</label>
                                <img id="image-preview2" alt="image preview" <?php echo ($data['logo_dark']!=''?'src="'.BASE_HREF2.'images/post/'.$data['logo_dark'].'" style="display:block"':''); ?>>
                                <br/>
                                <input class="form-control" type="file" name="logo_dark" id="image-source2" accept="image/*" onchange="previewImage2();"/>
                            </div>
                            <div class="form-group">
                                <label>Logo Putih</label>
                                <img id="image-preview3" alt="image preview" <?php echo ($data['logo_light']!=''?'src="'.BASE_HREF2.'images/post/'.$data['logo_light'].'" style="display:block"':''); ?>>
                                <br/>
                                <input class="form-control" type="file" name="logo_light" id="image-source3" accept="image/*" onchange="previewImage3();"/>
                            </div>
                            <hr>                        
                            <div class="form-group">
                                <label>Copy right</label>
                                <input type="text" class="form-control" name="copyright" value="<?= $data['copyright']; ?>" placeholder="" required>
                            </div>
                            <!--
                            <div class="form-group">
                                <label>Link App Store</label>
                                <input type="text" class="form-control" name="appstore" value="<?= $data['appstore']; ?>" placeholder="TMasukan link App Store" required>
                            </div>                            
                            <hr> -->
                            <?php if(roleActivate("role_write", $permissionPengaturan)):?>
                            <button type="submit" class="btn btn-primary">Simpan Pengaturan Umum</button>
                            <?php endif; ?>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
