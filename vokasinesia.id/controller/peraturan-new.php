<?php include "include/m.i.s.c.php"; ?>
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


        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo ($_GET['act']=='new'?'Tulis Peraturan Baru':'Ubah Data Peraturan'); ?></h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form">
                
                            <?php if ($_GET['act']=='edit'): ?>
                                <input type="hidden" name="act" value="edit">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <?php $data = detailpost($_GET['id']); ?>
                            <?php elseif ($_GET['act']=='new'): ?>
                                <input type="hidden" name="act" value="new">
                            <?php endif; ?>

                            <?= $notification ?>
                            
                            <div class="form-group">
                                <label>Judul Peraturan</label>
                                <input class="form-control" placeholder="Tulis judul peraturan" required>
                            </div>
                            <div class="form-group">
                                <label>Text Pendek Peraturan</label>
                                <textarea class="form-control" rows="3" placeholder="Tulis text pendek peraturan" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Isi Peraturan</label>
                                <textarea class="form-control" rows="8" placeholder="Tulis isi peraturan" required></textarea>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Tambah Peraturan Baru</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
