<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Artikel "Judul Artikelnya"</h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <form role="form">
                
                            <div class="alert alert-success">
                                Perubahan artikel sukses.
                            </div>
                            <div class="alert alert-danger">
                                Periksa kembali data Anda.
                            </div>
                            
                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <input class="form-control" value="HiPajak bantu urus EFIN Pribadi kamu" required>
                            </div>
                            <div class="form-group">
                                <label>Text Pendek Artikel</label>
                                <textarea class="form-control" rows="3" required>Lorem Ipsum Dolor Sit Amet</textarea>
                            </div>
                            <div class="form-group">
                                <label>Isi Artikel</label>
                                <textarea class="form-control" rows="8" required>Lorem Ipsum Dolor Sit Amet</textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Tayangan</label>
                                <input type="file">
                                <div class="img-preview"><img src="https://via.placeholder.com/150"></div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan Artikel</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
