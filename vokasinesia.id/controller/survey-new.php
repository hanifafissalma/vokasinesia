<?php include "include/m.i.s.c.php"; ?>
<?php if($_SESSION['level']==2) header("Location:blank"); ?>
<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah Survey Baru</h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <?php if(checkActiveSurvey()==true): ?>
                    <div class="col-lg-12">
                        <form role="form" action="do.survey.php" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label>Judul Survey</label>
                                <input type="text" class="form-control" name="judul" placeholder="Masukan Judul Survey"   required>
                            </div>

                            <div class="form-group">
                                <label>Pilihan Survey</label>                          
                                <div class="field_wrapper2">
                                    <div class="form-group">                                    
                                        <input type="text" name="pilihan_survey[]" class="form-control" style="width: 80%;display: inline;" placeholder="nama pilihan survey" required/>
                                        <a href="javascript:void(0);" class="add_button2" title="Add field"><img src="vendor/add-icon.png"/></a>
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Survey">
                            </div>                                                     
                            <hr>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>                              
                    </div>
                    <?php else: ?>
                    <div class="col-lg-12">
                    Masih ada survey yang aktif, Anda belum bisa membuat survey baru.
                    </div>
                    <?php endif; ?>    
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
