            
    <div class="footer">
        <div class="container wrapper">
            <div class="row">
                <div class="col-md-4 col-sm-12 mb-5">
                    <div class="logo">
                        <img src="images/post/<?= $pUmum['logo_light'] ?>" alt="<?= $pUmum['title'] ?>">
                    </div>
                    <p><?= $pUmum['description'] ?></p>
                    <div class="d-flex">
                        <span><a href="<?= $pKontak['facebook'] ?>" target="_blank"><i class="fab fa-facebook-square fa-2x text-white"></i></a></span>
                        <span><a href="<?= $pKontak['instagram'] ?>" target="_blank"><i class="fab fa-instagram fa-2x text-white ml-2"></i></a></span>
                        <span><a href="<?= $pKontak['twitter'] ?>" target="_blank"><i class="fab fa-twitter fa-2x text-white ml-2"></i></a></span>
                        <span><a href="<?= $pKontak['youtube'] ?>" target="_blank"><i class="fab fa-youtube fa-2x text-white ml-2"></i></a></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-5">
                    <div class="alamat">
                        <h3>Hubungi Kami</h3>
                        <div class="row">
                            <div class="col-md-1 col-sm-1">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <?= nl2br($pKontak['address']) ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-1 col-sm-1">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <a href="mailto:<?=$pKontak['display_email']?>" style="color:white !important">
                                    <?= $pKontak['display_email'] ?>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-1 col-sm-1">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <?= $pKontak['phone'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul>
                                <li><a href="arsip/program-studi" >Program Studi</a></li>
                                <li><a href="arsip/info-magang" >Info Magang</a></li>
                                <li><a href="arsip/beasiswa" >Beasiswa</a></li>
                                <li><a href="arsip/cari-kampus" >Cari Kampus</a></li>
                                <li><a href="arsip/kursus" >Kursus</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul>
                                <li><a href="arsip/vokasi" >Vokasi</a></li>
                                <li><a href="arsip/industri" >Industri</a></li>
                                <li><a href="arsip/vokapreneur" >Vokapreneur</a></li>
                                <li><a href="galeri" >Galeri</a></li>
                                <li><a href="kontak" >Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="navigasi">
                    
                    </div>
                </div>
                <div class="col-12 copyright">
                    <?= $pUmum['copyright'] ?>
                </div>
            </div>
        </div>
    </div>
    
    </main>   

    <a class="scrolltop"></a>
        
                
    <script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/slick-lightbox.js"></script>
	<script src="js/dd6f59b332.js"></script>
    <script src="js/jdenticon.js"></script>
    <script src="js/jquery.instagramFeed.min.js"></script>
    <script>
        (function($){
            $(window).on('load', function(){
                $.instagramFeed({
                    'username': 'vokasinesia',
                    'container': "#instagram-cont",
                    'display_profile': false,
                    'display_biography': false,
                    'display_gallery': true,
                    'items': 9,
                    'items_per_row': 3,
                    'margin': 1
                });
            });
        })(jQuery);
    </script>
    <script src="js/script.js?<?php echo(rand(1,9999999)); ?>"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y23EKE474L"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-Y23EKE474L');
    </script>

    <!-- Default Statcounter code for VOKASINESIA https://vokasinesia.id -->
	<script type="text/javascript">
	var sc_project=12447668; 
	var sc_invisible=1; 
	var sc_security="e03bc2b9"; 
	var sc_https=1; 
	var sc_remove_link=1; 
	</script>
	<script type="text/javascript"
	src="https://www.statcounter.com/counter/counter.js" async></script>
	<noscript><div class="statcounter"><img class="statcounter"
	src="https://c.statcounter.com/12447668/0/e03bc2b9/1/" alt="free hit
	counter"></div></noscript>
	<!-- End of Statcounter Code -->

    </body>
    
</html>