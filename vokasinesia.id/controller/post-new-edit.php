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

        <?php if ($_GET['type']=='data'): ?>
        <script>
            function previewImage() {

                if(document.getElementById("image-source").files[0].size > 5000000){
                        alert("Ukuran file terlalu besar. Maksimal 2Mb");
                        this.value = "";
                }else{
                    document.getElementById("image-preview").style.display = "block";
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

                    oFReader.onload = function(oFREvent) {
                        document.getElementById("image-preview").src = oFREvent.target.result;
                    };
        	    }
            };

            function previewImage2() {

                if(document.getElementById("image-source2").files[0].size > 5000000){
                        alert("Ukuran file terlalu besar. Maksimal 2Mb");
                        this.value = "";
                }else{
                    document.getElementById("image-preview2").style.display = "block";
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("image-source2").files[0]);

                    oFReader.onload = function(oFREvent) {
                        document.getElementById("image-preview2").src = oFREvent.target.result;
                    };
                }
                };

          function isvideo(){
          	var a = document.getElementById("kategori").value.toLowerCase();
            if(a == "video"){
          		document.getElementById("video").style.display="block";
		      }
          }
        </script>
        <style type="text/css">
            #image-preview{
                display:none;
                width : 250px;
                height : auto;
            }
            #image-preview2{
                display:none;
                width : 250px;
                height : auto;
            }
        </style>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo ($_GET['act']=='new'?'Tulis Data baru':'Ubah data'); ?></h1>
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
                                <label>Text Pendek</label>
                                <textarea id="summernote-short" class="form-control" name="post_short" rows="3" placeholder="Tulis text pendek"><?php echo ($_GET['act']=='new'?'':$data['post_short']); ?></textarea>
                                <small class="text-danger">Maksimal isi 250 huruf</small>
                            </div>
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea id="summernote-long" class="form-control" name="post_text" rows="8" placeholder="Tulis isi"><?php echo ($_GET['act']=='new'?'':$data['post_text']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Tayangan Detail</label>                                
                                <img id="image-preview" alt="image preview" <?php echo ($data['img']!=''?'src="'.BASE_HREF2.'images/post/'.$data['img'].'" style="display:block"':'src="vendor/noimage.png"  style="display:block"'); ?> />
                                <br/>
                                <input class="form-control" type="file" name="img" id="image-source" accept="image/*"  <?php echo ($_GET['act']=='new'?'required':''); ?> onchange="previewImage();"/><small class="text-danger">Maksimal ukuran file untuk upload adalah 5 MB</small>
                            </div>
                            <input type="hidden" name="as_background" value="0">
                            <div class="form-group">
                                <label>Gambar Tayangan Thumbnail</label>                                
                                <img id="image-preview2" alt="image preview" <?php echo ($data['img_no_header']!=''?'src="'.BASE_HREF2.'images/post/'.$data['img_no_header'].'" style="display:block"':'src="vendor/noimage.png"  style="display:block"'); ?> />
                                <br/>
                                <input class="form-control" type="file" name="img_no_header" id="image-source2" accept="image/*" onchange="previewImage2();"/><small class="text-danger">Maksimal ukuran file untuk upload adalah 5 MB</small>
                            </div>
                            <div class="form-group">
                                <label>Kategori </label>
                                <select class="form-control" name="subtype" id="kategori" onchange="isvideo()">
                                    <?php 
                                    $kategori = getAllCategory();
                                    for($i=0;$i<sizeof($kategori);$i++):?>
                                        <option value="<?= $kategori[$i]['category_name'] ?>" <?php echo($_GET['act']=='edit'?($data['subtype']==$kategori[$i]['category_name']?'selected':''):'') ?>><?= $kategori[$i]['category_name']?> </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <?php if($_GET['act']=='edit'){ ?>
                                <?php if(strtolower($data['subtype'])=="video"){ ?>
                                    <div class="form-group">
                                        <label>Link Video</label>                          
    	                                <div class="field_wrapper">
    	                                <?php $customField = json_decode($data['custom_field'], true);
    	                                    if($customField){ 
    	                                        $i=0;?>                            
    	                                        <?php foreach ($customField as $key => $value): ?>
    	                                            <?php foreach ($value as $key2 => $value2): ?>
    	                                            <div class="form-group">                                    
    	                                                <input type="hidden" name="field_name[]" placeholder="Nama Kolom" value="video"/>
    	                                                <input type="text" name="field_content[]" placeholder="Kode Youtub" class="form-control" value="<?= $value2 ?>"/>
    	                                                <?php /* if($i==0): ?>
    	                                                <a href="javascript:void(0);" class="add_button" title="Add field"><img src="vendor/add-icon.png"/></a>
    	                                                <?php elseif($i>0): ?>
    	                                                <a href="javascript:void(0);" class="remove_button"> <img src="vendor/remove-icon.png"/></a>  
    	                                                <?php endif; */ ?>
    	                                            </div>
    	                                            <?php $i++ ?>
    	                                            <?php endforeach; ?>
    	                                        <?php endforeach; ?>                                
    	                                    <?php }
                                             else { ?>
    	                                    <div class="form-group">                                    
    	                                        <input type="text" name="field_name[]" placeholder="Nama Kolom" value=""/>
    	                                        <input type="text" name="field_content[]" placeholder="Isi Kolom" value=""/>
    	                                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="vendor/add-icon.png"/></a>
    	                                    </div>
    	                                    <?php }?>
    	                                </div>
                                    </div>  
                                <?php }?>
                            <?php }
                            elseif($_GET['act']=='new'){ ?>
                                        <div class="form-group" id="video" style="display:none;">        
                                            <label>Link Video</label>                          
                                            <div class="field_wrapper">                            
                                            <input type="hidden" name="field_name[]" placeholder="Nama Kolom" value="video"/>
                                            <input type="text" name="field_content[]" class="form-control" placeholder="Kode Youtube" value=""/>
                                            <!--<a href="javascript:void(0);" class="add_button" title="Add field"><img src="vendor/add-icon.png"/></a> -->
                                            </div>
                                        </div>
                            <?php } ?>
                            <div class="form-group">
                                <label>Tags</label>                                
                                <input name="tags" class="form-control tags-control" placeholder='Tulis Tags (Pisahkan dengan koma)' value='<?php echo ($_GET['act']=='new'?'':$data['tag']); ?>'>
                            </div>
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="header" value="0">
                            <input type="hidden" name="footer" value="0">
                            <?php if(roleActivate("role_write", $permissionPost)):?>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>                                        
                                        <input type="checkbox" value="1" name="status" <?php echo ($_GET['act']=='new'?'':checked($data['status'],1)); ?>><strong>Publish</strong>
                                    </label>
                                </div>
                            </div>
   							<div class="row">
	      						<div class='col-sm-4'>
									<div class="form-group">
										<div class='input-group date' id='datetimepicker4'>
											<input type='text' name="tanggal" class="form-control" value="<?php echo ($_GET['act']=='new'?'':$data['tgl_create']); ?>" />
											<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</div>
						     	</div>
					        </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="comment" value="0">
                                        <input type="checkbox" value="1" name="comment" <?php echo ($_GET['act']=='new'?'':checked($data['comment'], 1)); ?>><strong>Buka Komentar</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <button name="submit" value="0" onclick="klikSubmit(this.value)" class="btn btn-danger">Preview</button>
                            <button name="submit" value="1" onclick="klikSubmit(this.value)" class="btn btn-primary">Simpan</button>
                        </form>                              
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
                        <h1 class="page-header"><?php echo ($_GET['act']=='new'?'Tulis halaman statis baru':'Ubah data halaman statis'); ?></h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form" action="do.post.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="static">                            
                            <?php if ($_GET['act']=='edit'): ?>
                                <input type="hidden" name="act" value="edit">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <input type="hidden" name="subtype" value="<?= $_GET['subtype'] ?>">
                                <?php $data = detailpost($_GET['id']); ?>
                            <?php elseif ($_GET['act']=='new'): ?>
                                <input type="hidden" name="act" value="new">
                            <?php endif; ?>
                
                            <?= $notification ?>
                            
                            <div class="form-group">
                                <label>Judul halaman statis</label>
                                <input class="form-control" name="post_title" value="<?php echo ($_GET['act']=='new'?'':$data['post_title']); ?>" placeholder="Tulis judul halaman statis" required>
                            </div>
                            <div class="form-group">
                                <label>Isi halaman statis</label>
                                <textarea id="summernote" class="form-control" name="post_text" rows="8" placeholder="Tulis isi halaman statis" required><?php echo ($_GET['act']=='new'?'':$data['post_text']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" value="1" name="status" <?php echo ($_GET['act']=='new'?'':checked($data['status'], 1)); ?>><strong>Publish</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="header" value="0">
                                        <input type="checkbox" value="1" name="header" <?php echo ($_GET['act']=='new'?'':checked($data['header'], 1)); ?>><strong>Menu header</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="footer" value="0">
                                        <input type="checkbox" value="1" name="footer" <?php echo ($_GET['act']=='new'?'':checked($data['footer'], 1)); ?>><strong>Menu footer</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="comment" value="0">
                                        <input type="checkbox" value="1" name="comment" <?php echo ($_GET['act']=='new'?'':checked($data['comment'], 1)); ?>><strong>Komentar</strong>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Simpan Halaman Statis Baru</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
        <?php endif ?>

    </div>
<?php include "include/footer.php"; ?>