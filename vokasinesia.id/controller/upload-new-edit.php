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
        endif; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo ($_GET['act']=='new'?'Upload Baru':'Ubah Data Upload'); ?></h1>
                    </div>
                </div>
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form"  action="do.upload.php" method="post" enctype="multipart/form-data">
                            <?php if ($_GET['act']=='edit'): ?>
                                <input type="hidden" name="act" value="edit">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <?php $data = detailUpload($_GET['id']); ?>
                            <?php elseif ($_GET['act']=='new'): ?>
                                <input type="hidden" name="act" value="new">
                            <?php endif; ?>

                            <?= $notification ?>
                            
                            <div class="form-group">
                                <label>Judul Upload</label>
                                <input class="form-control" name="title" value="<?php echo ($_GET['act']=='new'?'':$data['title']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Upload File</label>
                                <input type="file" class="form-control" name="upload" <?php echo ($_GET['act']=='new'?'required':''); ?>>
                            </div>                            
                            <hr>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
