<?php include "include/m.i.s.c.php"; ?>
<?php if($_SESSION['level']==2) header("Location:blank"); ?>
<?php include "include/header.php"; ?>

<body>
    <div id="wrapper">
        <?php include "include/navigation.php"; ?>

         <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="s")): 
            $notification = '<div class="alert alert-success">   
                Ubah data sukses.
            </div>';
        elseif (isset($_GET['notif'])&&($_GET['notif']=='f')):
            $notification = '<div class="alert alert-danger">
                Periksa kembali data Anda.
            </div>';
        elseif (isset($_GET['notif'])&&($_GET['notif']=='x')):
            $notification = '<div class="alert alert-danger">
                Ubah data gagal, nama kategori sudah ada.
            </div>';
        endif; ?>

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
                width : 250px;
                height : auto;
            }
        </style>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo ($_GET['act']=='new'?'Kategori Baru':'Ubah Data Kategori'); ?></h1>
                    </div>
                </div>
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form"  action="do.category.php" method="post" enctype="multipart/form-data">
                            <?php if ($_GET['act']=='edit'): ?>
                                <input type="hidden" name="act" value="edit">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <?php $data = detailCategory($_GET['id']); ?>
                            <?php elseif ($_GET['act']=='new'): ?>
                                <input type="hidden" name="act" value="new">
                            <?php endif; ?>

                            <?= $notification ?>
                            
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input class="form-control" name="category_name" value="<?php echo ($_GET['act']=='new'?'':$data['category_name']); ?>" required>
                                <div class="form-group">
                                <label>Gambar Tayangan</label>                                
                                <img id="image-preview" alt="image preview" <?php echo ($data['img']!=''?'src="'.BASE_HREF2.'images/post/'.$data['img'].'" style="display:block"':'src="vendor/noimage.png"  style="display:block"'); ?> />
                                <br/>
                                <input class="form-control" type="file" name="img" id="image-source" accept="image/*"  <?php echo ($_GET['act']=='new'?'required':''); ?> onchange="previewImage();"/>
                                <small class="text-danger">Maksimal ukuran file untuk upload adalah 5 MB<br>Rekomendasi dimensi gambar adalah 1600px X 300px</small>
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
