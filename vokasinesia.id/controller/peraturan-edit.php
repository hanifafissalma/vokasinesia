<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Peraturan "SURAT EDARAN DIRJEN PAJAK NOMOR SE-29/PJ/2015"</h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form">
                
                            <div class="alert alert-success">
                                Perubahan peraturan sukses.
                            </div>
                            <div class="alert alert-danger">
                                Periksa kembali data Anda.
                            </div>
                            
                            <div class="form-group">
                                <label>Judul Peraturan</label>
                                <input class="form-control" value="HiPajak bantu urus EFIN Pribadi kamu" required>
                            </div>
                            <div class="form-group">
                                <label>Text Pendek Peraturan</label>
                                <textarea class="form-control" rows="3" required>Lorem Ipsum Dolor Sit Amet</textarea>
                            </div>
                            <div class="form-group">
                                <label>Isi Peraturan</label>
                                <textarea class="form-control" rows="8" required>Lorem Ipsum Dolor Sit Amet</textarea>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan Peraturan</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
