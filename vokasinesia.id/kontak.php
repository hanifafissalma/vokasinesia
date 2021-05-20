<?php include("include/m.i.s.c.php"); ?>
<?php 
    // $data = detailPost($_GET['type'], $_GET['slug']);
    $title = 'Vokasinesia - Hubungi Kami';
    $pKontak  = getContactSettings();
    $pUmum    = getPengaturanUmum();
?>
<?php include("include/header.php"); ?>

    <div class="details">
        <div class="box-title d-flex align-items-center">
            <div class="container">
                <h1 class="head-title mb-0">HUBUNGI KAMI</h1>
            </div>
        </div>
        <br/><br/>
        <div class="container wrapper">
        	<div class="details-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(isset($_GET['x'])&&($_GET['x']=="s")): ?>
                        <div class="alert alert-success">   
                            Terima kasih telah menghubungi kami, tim kami akan mengirimkan balasan secepatnya ke email kamu.
                        </div>
                        <?php endif; ?>
                    	<div class="details-whitearea">
                            <div class="row">
                                <div class="col-12">
                                    <p>Jika ingin mengetahui informasi lebih lanjut terkait hal-hal teknis, layanan dan konten yang terkandung dalam situs web ini kamu dapat langsung menghubungi via telepon di nomor yang telah disediakan. Bila ingin menghubungi via email, kamu dapat melengkapi kolom pada formulir di bawah ini berikut pesan yang ingin disampaikan dan kemudian klik submit. Selanjutnya, tim kami akan mengirimkan balasan secepatnya ke email kamu. Jadi pastikan email yang kamu masukkan berstatus aktif dan valid.</p>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="contactarea">
                                        <h3>Alamat Kami</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="contact-section">
                                                <span><i class="fa fa-home"></i> Alamat</span>
                                                <?= nl2br($pKontak['address']) ?>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-12">
                                                <div class="contact-section">
                                                <span><i class="fa fa-phone"></i> Nomor Telepon</span>
                                                <?= $pKontak['phone'] ?><br>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div class="contact-section">
                                                <span><i class="fa fa-envelope"></i> Surel</span>
                                                <?= $pKontak['display_email'] ?><br>&nbsp;
                                                </div>
                                            </div>
                                            <div class="col-md-12 maparea">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31730.22791872535!2d106.78361813955075!3d-6.226965999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1b2dba2d865%3A0x945b25babb01187d!2sKementerian%20Pendidikan%20dan%20Kebudayaan%20Gedung%20D!5e0!3m2!1sen!2sid!4v1608624819638!5m2!1sen!2sid" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="contactarea">
                                    <h3>Kirim Pesan</h3>                                    
                                        <form class="row mt-4" method="post" action="do.kontak">
                                            <div class="col-md-6 form-group">
                                                <label for="nama">Nama Lengkap:</label>
                                                <input type="text" name="nama" class="form-control" placeholder="" id="" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="email">Surel:</label>
                                                <input type="email" name="email" class="form-control" placeholder="" id="" required>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="judul">Judul Pesan:</label>
                                                <input type="text" name="judul" class="form-control" placeholder="" id="" required>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="comment">Isi Pesan:</label>
                                                <textarea class="form-control" name="isi" rows="8" placeholder="" id="" required></textarea>
                                            </div>
                                            <div class="col-md-12">
                                            <button type="submit" class="btn btn-arsipbut">Kirim Pesan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
	                    </div>                        
    				</div>                    
                </div>   
            </div> 	
    	</div>    	
    </div>
<?php include("include/footer.php"); ?>