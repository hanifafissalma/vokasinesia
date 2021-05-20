<?php include("include/m.i.s.c.php"); ?>
<?php  
  $pKontak  = getContactSettings();  
  $pUmum    = getPengaturanUmum();
  $title    = $pUmum['title'];
?>
<?php include("include/header.php"); ?>

    <div class="banner-slide">      
          <?php
          $slide = slide(6, "ASC"); 
          foreach ($slide as $key => $value):?>
            <?php $customField = json_decode($slide[$key]['custom_field'], true);
            if($customField): ?>                            
                <?php foreach ($customField as $kunci => $nilai): ?>
                    <?php foreach ($nilai as $kunci2 => $nilai2): ?>
                        <?php if($nilai2!=""): ?>
                            <div class="banner-slide-box"><a href="<?= $nilai2 ?>"><img src="images/post/<?= $slide[$key]['img'] ?>" alt="<?= $slide[$key]['post_title'] ?>"></a></div>
                        <?php else:?>
                            <div class="banner-slide-box"><img src="images/post/<?= $slide[$key]['img'] ?>" alt="<?= $slide[$key]['post_title'] ?>"></div>
                        <?php endif; ?>
                    <?php endforeach;?>
                <?php endforeach;?>
            <?php endif; ?>              
          <?php endforeach;
          ?>
    </div>   
    <div class="section2">
		<div class="container wrapper">
            <div class="row">
                <div class="col-md-6 mb-4">               
                    <h3>Berita<div class="btn btn-viewall-s float-right"><a href="arsip/berita">Semua Berita <i class="fa fa-chevron-right"></i></a></div></h3>
                    <div class="row">                		                        	
                            <?php
                            $firstPost = getFirstPost("data", 2, "DESC");
                            if($firstPost):
                                ?>
                            <div class="col-6">
                                <div class="artikel-img">
                                 <img src="images/post/<?= $firstPost['img'] ?>" alt="<?= $firstPost['post_title'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="artikel-content">
                                <h2><a href="<?= $firstPost['type'] ?>/<?= $firstPost['post_slug'] ?>" title="<?= $firstPost['post_title'] ?>"><?= $firstPost['post_title'] ?></a></h2>
                                <p><?= $firstPost['post_short'] ?></p>
                                <p><a href="<?= $firstPost['type'] ?>/<?= $firstPost['post_slug'] ?>" title="">Baca Selengkapnya &rarr;</a></p>
                                </div>
                            </div>
                            <?php
                            endif;
                            ?>
                    </div>
    			</div>
                <div class="col-md-6 mb-4">               
                    <h3>Liputan<div class="btn btn-viewall-s float-right"><a href="arsip/liputan">Semua Liputan <i class="fa fa-chevron-right"></i></a></div></h3>
                    <div class="row">                                                   
                            <?php
                            $firstPost = getFirstPost("data", 4, "DESC");
                            if($firstPost):
                                ?>
                            <div class="col-6">
                                <div class="artikel-img">
                                 <img src="images/post/<?= $firstPost['img'] ?>" alt="<?= $firstPost['post_title'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="artikel-content">
                                <h2><a href="<?= $firstPost['type'] ?>/<?= $firstPost['post_slug'] ?>" title="<?= $firstPost['post_title'] ?>"><?= $firstPost['post_title'] ?></a></h2>
                                <p><?= $firstPost['post_short'] ?></p>
                                <p><a href="<?= $firstPost['type'] ?>/<?= $firstPost['post_slug'] ?>" title="">Baca Selengkapnya &rarr;</a></p>
                                </div>
                            </div>
                            <?php
                            endif;
                            ?>
                    </div>
                </div>
                <div class="col-md-6 mb-4">               
                    <h3>Artikel<div class="btn btn-viewall-s float-right"><a href="arsip/artikel">Semua Artikel <i class="fa fa-chevron-right"></i></a></div></h3>
                    <div class="row">                                                   
                            <?php
                            $firstPost = getFirstPost("data", 1, "DESC");
                            if($firstPost):
                                ?>
                            <div class="col-6">
                                <div class="artikel-img">
                                 <img src="images/post/<?= $firstPost['img'] ?>" alt="<?= $firstPost['post_title'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="artikel-content">
                                <h2><a href="<?= $firstPost['type'] ?>/<?= $firstPost['post_slug'] ?>" title="<?= $firstPost['post_title'] ?>"><?= $firstPost['post_title'] ?></a></h2>
                                <p><?= $firstPost['post_short'] ?></p>
                                <p><a href="<?= $firstPost['type'] ?>/<?= $firstPost['post_slug'] ?>" title="">Baca Selengkapnya &rarr;</a></p>
                                </div>
                            </div>
                            <?php
                            endif;
                            ?>
                    </div>
                </div>
                <div class="col-md-6 mb-4">               
                    <h3>Profil<div class="btn btn-viewall-s float-right"><a href="arsip/profil">Semua Profil <i class="fa fa-chevron-right"></i></a></div></h3>
                    <div class="row">                                                   
                            <?php
                            $firstPost = getFirstPost("data", 3, "DESC");
                            if($firstPost):
                                ?>
                            <div class="col-6">
                                <div class="artikel-img">
                                 <img src="images/post/<?= $firstPost['img'] ?>" alt="<?= $firstPost['post_title'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="artikel-content">
                                <h2><a href="<?= $firstPost['type'] ?>/<?= $firstPost['post_slug'] ?>" title="<?= $firstPost['post_title'] ?>"><?= $firstPost['post_title'] ?></a></h2>
                                <p><?= $firstPost['post_short'] ?></p>
                                <p><a href="<?= $firstPost['type'] ?>/<?= $firstPost['post_slug'] ?>" title="">Baca Selengkapnya &rarr;</a></p>
                                </div>
                            </div>
                            <?php
                            endif;
                            ?>
                    </div>
                </div>
    		</div>    	
    	</div>  
    </div>
    
    <div class="section3">
		<div class="container wrapper">
    	<div class="separator"></div>
            <div class="row">
                <div class="col-12">
            	    <h3>Infografis</h3>
                    <div class="infografis-slide">
                    <?php
                    $infografis = getListPost("data", 7, 0, 10, "DESC");
                    if($infografis):
                        foreach($infografis as $key => $value): ?>
                        <div class="infografis-slide-box">
                            <a href="images/post/<?= $infografis[$key]['img'] ?>"><img src="images/post/<?= $infografis[$key]['img'] ?>" alt="<?= $infografis[$key]['post_title'] ?>">
                            </a>
                        </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                    </div>
                    <div class="col-12 text-center">
                        <div class="btn btn-viewall"><a href="arsip/infografis">Semua Infografis <i class="fa fa-chevron-right"></i></a></div>
                    </div>
    			</div>
    		</div>    	
    	</div>  
    </div>
    
    <div class="section4">
		<div class="container wrapper">
    	<div class="separator"></div>
        <h3>Video</h3>
            <div class="row">
                <?php
                $video = getListPost("data", 6, 0, 2, "DESC");
                if($video):
                    foreach($video as $key => $value): ?>
                    <div class="col-6">
                        <div class="video-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="gambar">                                    
                                        <a href="<?= $video[$key]['type'] ?>/<?= $video[$key]['post_slug'] ?>">
                                            <img src="images/post/<?= $video[$key]['img'] ?>" alt="<?= $video[$key]['post_title'] ?>">
                                            <div class="imgoverlay"><i class="fa fa-play"></i></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 vid-title">
                                    <div class="text">
                                        <h2><a href="<?= $video[$key]['type'] ?>/<?= $video[$key]['post_slug'] ?>"><?= $video[$key]['post_title'] ?></a></h2>                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endforeach;
                endif;
                ?>
                <div class="col-12 text-center">
                    <div class="btn btn-viewall"><a href="arsip/video">Semua Video <i class="fa fa-chevron-right"></i></a></div>
                </div>
    		</div>    	
    	</div>  
    </div>
    
    <div class="section5">
        <div class="container wrapper">
            <div class="separator"></div> 
            <h3>Profil Ditjen Vokasi </h3>   
            <p>
                Ditjen Pendidikan Vokasi saat ini dipimpin oleh <b>Wikan Sakarinto, S.T., M.Sc., Ph.D</b>.
            </p>  
            <br/>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <img src="https://vokasi.kemdikbud.go.id/themes/default/images/about.jpg" alt="about" width="100%">
                </div>
                <div class="col-md-8 col-sm-12">
                    <h4>
                        Tugas Pokok dan Fungsi
                    </h4>
                    <p>
                        Ditjen Pendidikan Vokasi mempunyai tugas menyelenggarakan perumusan dan pelaksanaan 
                        kebijakan dibidang pendidikan vokasi.
                    </p>
                    <p>
                        Berdasarkan Peraturan Menteri Pendidikan dan Kebudayaan Nomor 9 Tahun 2020 Tentang Perubahan 
                        Atas Peraturan Menteri Pendidikan dan Kebudayaan Nomor 45 Tahun 2019 Tentang Organisasi dan 
                        Tata Kerja Kementrian Pendidikan dan Kebudayaan, disebutkan Ditjen Pendidikan Vokasi 
                        terdiri dari 5 unit yakni:
                        <ul>
                            <li class="mt-2">
                                <a href="https://vokasi.kemdikbud.go.id/profil-setditjen-pendidikan-vokasi" target="_blank">
                                    <b>Sekretariat Direktorat Jenderal Pendidikan Vokasi</b>
                                </a>
                            </li>
                            <li class="mt-2">
                                <a href="https://vokasi.kemdikbud.go.id/profil-dit-smk" target="_blank">
                                    <b>Direktorat Sekolah Menengah Kejuruan</b>
                                </a>
                            </li>
                            <li class="mt-2">
                                <a href="https://vokasi.kemdikbud.go.id/profil-dit-dikti-vokasi-dan-profesi" target="_blank">
                                    <b>Direktorat Pendidikan Tinggi Vokasi dan Profesi</b>
                                </a>
                            </li>
                            <li class="mt-2">
                                <a href="https://vokasi.kemdikbud.go.id/profil-dit-kursus-dan-pelatihan" target="_blank">
                                    <b>Direktorat Kursus dan Pelatihan</b>
                                </a>
                            </li>
                            <li class="mt-2">
                                <a href="https://vokasi.kemdikbud.go.id/profil-dit-kemitraan-dan-penyelarasan-dudi" target="_blank">
                                    <b>Direktorat Kemitraan dan Penyelarasan Dunia Usaha dan Dunia Industri</b>
                                </a>
                            </li>
                        </ol>
                    </p>
                    <div class="btn btn-viewall">
                        <a href="https://vokasi.kemdikbud.go.id/" target="_blank">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>      
    </div>    

    <?php include("include/footer.php"); ?>