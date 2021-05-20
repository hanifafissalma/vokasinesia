<?php include("include/m.i.s.c.php"); ?>
<?php 
    $title = 'Vokasinesia - Galeri';
    $pKontak  = getContactSettings();
    $pUmum    = getPengaturanUmum();
?>
<?php include("include/header.php"); ?>
    <div class="details">
        <div class="box-title d-flex align-items-center">
            <div class="container">
                <h1 class="head-title mb-0">GALERI</h1>
            </div>
        </div>
        <br/><br/>
        <div class="container wrapper">
            <h3>Video</h3>
            <div class="row">
                <?php
                $video = getListPost("data", 6, 0, 4, "DESC");
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
            <br/><br/>
            <h3>Infografis</h3>
            <div class="row">
                <?php
                $infografis = getListPost("data", 7, 0, 4, "DESC");
                if($infografis):
                    foreach($infografis as $key => $value): ?>
                    <div class="col-md-6 mt-3">
                        <a href="images/post/<?= $infografis[$key]['img'] ?>">
                            <img src="images/post/<?= $infografis[$key]['img'] ?>" alt="<?= $infografis[$key]['post_title'] ?>" style="width:100%">
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
<?php include("include/footer.php"); ?>