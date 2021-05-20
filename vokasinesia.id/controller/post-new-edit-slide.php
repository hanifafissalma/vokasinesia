<?php include "include/m.i.s.c.php"; ?>
<?php if(($_SESSION['level']==2) && isset($_GET['type']) && ($_GET['type']=="statis")) header("Location:blank"); ?>
<?php $data = array(); ?>
<?php $data['img'] = ""; ?>
<?php include "include/header.php"; ?>
<body>


    <div id="wrapper">

        <?php include "include/navigation.php"; ?>
        <?php 
        $notification = "";
        if(isset($_GET['notif'])&&($_GET['notif']=="ns")): 
            $notification = '<div class="alert alert-success">   
                Penulisan data baru sukses.
            </div>';
        elseif(isset($_GET['notif'])&&($_GET['notif']=="s")): 
            $notification = '<div class="alert alert-success">   
                Ubah data sukses.
            </div>';
        elseif (isset($_GET['notif'])&&($_GET['notif']=='f')):
            $notification = '<div class="alert alert-danger">
                Periksa kembali data Anda.
            </div>';
        endif; ?>

        <script>
            function previewImage() {

            if(document.getElementById("image-source").files[0].size > 5000000){
                   alert("Ukuran file terlalu besar. Maksimal 5Mb");
                   this.value = "";
                }
            else{
                document.getElementById("image-preview").style.display = "block";
                var oFReader = new FileReader();
                 oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

                oFReader.onload = function(oFREvent) {
                  document.getElementById("image-preview").src = oFREvent.target.result;
            };
            }
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
                        <h1 class="page-header"><?php echo ($_GET['act']=='new'?'Upload Slide Baru':'Ubah data'); ?></h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form" id="myform" action="do.post.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="data">
                            <?php if ($_GET['act']=='edit'): ?>
                                <input type="hidden" name="act" value="edit">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <?php $data = detailpost($_GET['id']); ?>
                            <?php elseif ($_GET['act']=='new'): ?>
                                <input type="hidden" name="act" value="new">
                            <?php endif; ?>

                            <?= $notification ?>
                            
                            <div class="form-group">
                                <label>Judul</label>
                                <input class="form-control" name="post_title" placeholder="Tulis judul" value="<?php echo ($_GET['act']=='new'?'':$data['post_title']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar Tayangan</label>                                
                                <img id="image-preview" alt="image preview" <?php echo ($data['img']!=''?'src="'.BASE_HREF2.'images/post/'.$data['img'].'" style="display:block"':'src="vendor/noimage.png"  style="display:block"'); ?> />
                                <br/>
                                <input class="form-control" type="file" name="img" id="image-source" accept="image/*"  <?php echo ($_GET['act']=='new'?'required':''); ?> onchange="previewImage();"/>
                                <small class="text-danger">Maksimal ukuran file untuk upload adalah 5 MB<br>Rekomendasi dimensi gambar adalah 1600px X 500px</small>
                            </div>
                            <input type="hidden" name="as_background" value="0">
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="header" value="0">
                            <input type="hidden" name="footer" value="0">
                            <input type="hidden" name="comment" value="0">
                            <input type="hidden" name="subtype" value="slide">
                            <?php if(roleActivate("role_write", $permissionSlide)):?>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>                                                                                
                                        <input type="checkbox" value="1" name="status" <?php echo ($_GET['act']=='new'?'':checked($data['status'],1)); ?>><strong>Publikasi Aktif</strong>                                        
                                    </label>
                                </div>
                            </div>
                            <?php endif; ?>
                            <hr>
                            <div class="form-group">
                                <label>Link URL</label>
                            </div>
                            <div class="field_wrapper">
                            <?php
                            if($_GET['act']=='edit'):
                            $customField = json_decode($data['custom_field'], true);
                                if($customField): 
                                    $i=0;?>                            
                                    <?php foreach ($customField as $key => $value): ?>
                                        <?php foreach ($value as $key2 => $value2): ?>
                                        <div class="form-group">                                    
                                            <input type="hidden" name="field_name[]" placeholder="Nama Kolom" value="link"/>
                                            <input type="text" name="field_content[]" placeholder="url"  style="width:400px;" value="<?= $value2 ?>"/>
                                            <?php /* if($i==0): ?>
                                            <a href="javascript:void(0);" class="add_button" title="Add field"><img src="vendor/add-icon.png"/></a>
                                            <?php elseif($i>0): ?>
                                            <a href="javascript:void(0);" class="remove_button"> <img src="vendor/remove-icon.png"/></a>  
                                            <?php endif; */?>
                                        </div>
                                        <?php $i++ ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>                                
                                <?php
                                else:
                                ?>
                                <div class="form-group">                                    
                                    <input type="text" name="field_name[]" placeholder="Nama Kolom" value=""/>
                                    <input type="text" name="field_content[]" placeholder="Isi Kolom" value=""/>
                                    <a href="javascript:void(0);" class="add_button" title="Add field"><img src="vendor/add-icon.png"/></a>
                                </div>
                                <?php
                                endif;
                            elseif($_GET['act']=='new'):?>
                                <div class="form-group">                                    
                                    <input type="hidden" name="field_name[]" placeholder="Nama Kolom" value="link"/>
                                    <input type="text" name="field_content[]" placeholder="url" value=""/>
                                   <?php /* <a href="javascript:void(0);" class="add_button" title="Add field"><img src="vendor/add-icon.png"/></a> */ ?>
                                </div>
                            <?php endif; ?>
                            </div>
                            <hr>
                            <button type="submit" name="submit" value="1" onclick="klikSubmit(this.value)" class="btn btn-primary">Simpan</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php include "include/footer.php"; ?>