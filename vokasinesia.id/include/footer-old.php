<section class="page-section" id="footer">
<div class="seventhframe">
    <div class="container">
    	<div class="row">
        	
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 footer-logo">
            	<div class="footer-logo-wh"><img src="images/post/<?= $pengaturankontak['logo'] ?>"></div>
                <div class="footer-sosmed">
                Follow Us on
                    <?= ($pengaturankontak['facebook']!=""?'<a href="https://www.facebook.com/'.$pengaturankontak['facebook'].'/" target="_blank"><i class="fa fa-facebook-official fa-2x"></i></a>':'') ?>
                    <?= ($pengaturankontak['instagram']!=""?'<a href="https://www.instagram.com/'.$pengaturankontak['instagram'].'/" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>':'') ?>                    
                    <?= ($pengaturankontak['twitter']!=""?'<a href="https://www.instagram.com/'.$pengaturankontak['twitter'].'/" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>':'') ?>
                </div>
            </div>
            
            <div class="col-lg-8 col-md-6 col-sm-12">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
						<div class="row">
	                        <div class="col-lg-6 col-md-6 col-sm-12 footer-misc">
	                            <ul>
	                                <li><strong><?= $pengaturankontak['company_name'] ?></strong></li>
	                                <li><?= nl2br($pengaturankontak['address']) ?></li>
	                            </ul>
	                        </div>
	                        <div class="col-lg-6 col-md-6 col-sm-12 footer-misc">
	                            <ul>
	                                <li>&nbsp;</li>
	                                <li>
									<span class="contact-icon"><i class="fa fa-envelope-o mr-2"></i></span><a href="mailto:<?= $pengaturankontak['display_email'] ?>"><?= $pengaturankontak['display_email'] ?></a><br />
									<span class="contact-icon"><i class="fa fa-whatsapp mr-2"></i></span><a href="https://wa.me/62<?= $pengaturankontak['phone'] ?>" target="_blank">0<?= $pengaturankontak['phone'] ?></a>
									</li>
	                            </ul>
	                        </div>
						</div>
                    </div>
                        
                    <div class="col-lg-12 col-md-12 col-sm-12 footer-misc">
	                    <?= liststatisfooter() ?>
                    </div> 
                        
                    <div class="col-lg-12 col-md-12 col-sm-12 copyright">
	                    Copyright &copy; 2019 - <?php echo date("Y"); ?> HiPajak
                    </div> 
            	</div>           
            </div>
        
        </div>
    </div>
</div>
</section>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script type="text/javascript" src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js?<?php echo(rand(1,1000000)); ?>"></script>
<script type="text/javascript" src="js/slick.js?<?php echo(rand(1,1000000)); ?>"></script>
<script type="text/javascript" src="js/slick-lightbox.js?<?php echo(rand(1,1000000)); ?>"></script>
<script type="text/javascript" src="js/sidenav.js?<?php echo(rand(1,1000000)); ?>"></script>
<script type="text/javascript" src="js/classie.js?<?php echo(rand(1,1000000)); ?>"></script>
<script type="text/javascript" src="js/cbpAnimatedHeader.js?<?php echo(rand(1,1000000)); ?>"></script>
<script type="text/javascript" src="js/all.js?<?php echo(rand(1,1000000)); ?>"></script>

</body>

</html>