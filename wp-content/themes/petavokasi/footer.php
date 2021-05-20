
        
        <div class="footer">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <h3>Bidang</h3>
                                <ul class="footer-list">
                                    <li><a href="<?php echo get_home_url(); ?>/category/permesinan" title="">Permesinan</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/category/konstruksi" title="">Konstruksi</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/category/ekonomi-kreatif" title="">Ekonomi Kreatif</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/category/hospitalitas" title="">Hospitalitas</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/category/layanan-perawatan" title="">Layanan Perawatan</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h3>Tentang</h3>
                                <ul class="footer-list">
                                    <li><a href="<?php echo get_home_url(); ?>/tentang-kami" title="">Tentang Program</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/hubungi-kami" title="">Hubungi Kami</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h3>Fitur</h3>
                                <ul class="footer-list">
                                    <li><a href="<?php echo get_home_url(); ?>/category/galeri-foto" title="">Galeri Foto</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/category/galeri-video" title="">Galeri Video</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h3>Ikuti Kami</h3>
                                <ul class="footer-list footer-sosmed">
                                    <li><a href="#!" title="" class="facebook"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                                    <li><a href="#!" title="" class="twitter"><i class="fa fa-twitter"></i> Twitter</a></li>
                                    <li><a href="#!" title="" class="instagram"><i class="fa fa-instagram"></i> Instagram</a></li>
                                    <li><a href="#!" title="" class="youtube"><i class="fa fa-youtube"></i> Youtube</a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>                    
                    <div class="col-md-10">
                        <div class="copyright">
                            Hak cipta &copy <?php echo date("Y"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <script src="<?php bloginfo('template_directory'); ?>/vendor/jquery-3.5.1.slim.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/vendor/popper.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/vendor/modernizr.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/vendor/bootstrap.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.min.js"></script>
    	<script src="<?php bloginfo('template_directory'); ?>/vendor/slick.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/datatables.min.js"></script>
        <script src="https://kit.fontawesome.com/dd6f59b332.js" crossorigin="anonymous"></script>
        <script src="<?php bloginfo('template_directory'); ?>/vendor/script.js?<?php echo(rand(1,9999999)); ?>"></script>

<?php wp_footer(); ?>

</body>

</html>