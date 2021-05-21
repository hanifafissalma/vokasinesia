<?php include("include/m.i.s.c.php"); ?>
<?php 
    $data = detailPost($_GET['type'], $_GET['slug']);
    $title = $data['post_title'];
    $pKontak  = getContactSettings();
    $pUmum    = getPengaturanUmum();
?>
<?php include("include/header.php"); ?>

    <div class="details">
    	<div class="details-featimg" 
        <?php if($data['as_background']==1): ?>
            style="background:url(images/post/<?= $data['img'] ?>) no-repeat center center"
        <?php else: ?>
            style="background: none;"
        <?php endif;?> 
        ><div class="blacked"></div></div>
        <div class="container wrapper">
        	<div class="details-content">
                <div class="row">
                    <div class="col-md-12">
                    <?php if($data['as_background']==1): ?>
                    <h1><?= $data['post_title'] ?></h1>
                    <?php else: ?>
                    <h1 class="h1-nonbg"><?= $data['post_title'] ?></h1>
                    <?php endif;?> 
                    </div>
                    <div class="col-md-8">
                    	<div class="details-whitearea">
                            <?php if(strtolower($data['subtype'])=="video"): ?>
                            <?php
                            $customField = json_decode($data['custom_field'], true);
                            ?>
                                <!-- video -->
                            <div class="details-whitearea-img embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $customField[0]['video'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <?php else: ?>
                            <div class="details-whitearea-img">
                                <a href="images/post/<?= $data['img'] ?>"><img src="images/post/<?= $data['img'] ?>" alt=""></a>
                            </div>
                            <?php endif; ?>
                            <?php if(strtolower($data['subtype'])!="infografis"): ?>
                            <div class="details-whitearea-content">
                                <?= $data['post_text'] ?>
                            </div>
                            <?php endif; ?>
	                    </div>
                        <?php $tags = generateTag($data['tag']);?>
                        <?php if($tags): ?>
                        <div class="tagsarea">
                        <h4>Tags</h4>
                            <ul>
                                <?php foreach ($tags as $key => $value): ?>
                                <li><a href="tag/<?= clean($value) ?>">#<?= $value ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        
                        <div class="sharearea">
                        <h4>Bagikan</h4>
                        <div class="sharethis-inline-share-buttons"></div>
                        </div>

                    	<?= getComments($data['id']) ?>
    				</div>
                    <div class="col-md-4">  
                        <!--                    	
                        <?php if(strtolower($data['subtype'])!="video"): ?>
                            <?php $anotherPost =  anotherPost($data['type'], $data['subtype'], $data['id'], 2); $i=0; ?>
                            <?php foreach($anotherPost as $key => $value): ?>
                                <?php $arrow = ($i==0?'left':'right'); ?>
                                <div class="details-right-box">
                                    <a href="<?= $data['type'] ?>/<?= $anotherPost[$key]['post_slug'] ?>" alt="<?= $anotherPost[$key]['post_title'] ?>">
                                    <div class="<?= $arrow ?>-arrow"><i class="fa fa-arrow-<?= $arrow ?>"></i></div>
                                    <h3><?= $anotherPost[$key]['post_title'] ?></h3>
                                    </a>
                                </div>
                                <?php $i++;?>
                            <?php endforeach;?>
                        <?php else: ?>
                        <div class="details-right-box video">
                            <h3>Video</h3>
                            <?php $anotherPost =  anotherPost($data['type'], $data['subtype'], $data['id'], 5); $i=0; ?>
                            <?php foreach($anotherPost as $key => $value): ?>
                            <div class="video-item">
                                <a href="<?= $data['type'] ?>/<?= $anotherPost[$key]['post_slug'] ?>" title="<?= $anotherPost[$key]['post_title'] ?>">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="image">
                                            <img src="images/post/<?= $anotherPost[$key]['img'] ?>">
                                            <div class="imgoverlay"><i class="fa fa-play"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <?= $anotherPost[$key]['post_title'] ?>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <?php endif;?>  
                        <div class="archive-right-box">
                            <h3>Search</h3>
                            <form action="pencarian" method="get" role="search" class="search">
                              <input type="hidden" name="subtype" value="<?= rClean($_GET['subtype']) ?>"> 
                              <input type="text" class="search-input" name="s" placeholder="Masukan kata kunci" aria-label="Cari">
                              <button type="submit" class="search-button"><span>Cari</span></button>
                            </form>
                        </div>
                        -->  
                        <div class="archive-right-box">
                            <h3><?= $data['subtype'] ?> Lainnya</h3>
                            <?php $anotherPost =  anotherPost($data['type'], $data['subtype'], $data['id'], 5); ?>
                            <?php foreach($anotherPost as $key => $value): ?>
                                <a href="<?= $data['type'] ?>/<?= $anotherPost[$key]['post_slug'] ?>" title="<?= $anotherPost[$key]['post_title'] ?>" class="related-list">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="relatedarea-img">
                                             <img src="images/post/<?= $anotherPost[$key]['img'] ?>" alt="<?= $anotherPost[$key]['post_title'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="relatedarea-content">
                                            <?= $anotherPost[$key]['post_title'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php $i++;?>
                            <?php endforeach;?>                            
                            <div class="arsipbut">
                            <a href="arsip/<?= $data['subtype'] ?>" class="btn btn-danger btn-arsipbut">Arsip <?= $data['subtype'] ?> &rarr;</a>
                            </div>
                        </div>
                        <div class="archive-right-box">
                            <h3>Kategori</h3>
                            <ul>
                            <?php $category = listCategory(); ?>
                            <?php foreach ($category as $key => $value): ?>
                                <?php if($category[$key]['status'] == 1):?>
                                    <li><a href="arsip/<?= clean($category[$key]['category_name']) ?>"><?= ucwords($category[$key]['category_name']) ?></a></li>
                                <?php endif?>
                            <?php endforeach; ?>
                            </ul>
                        </div> 
                    </div>
                </div>   
            </div> 	
    	</div>    	
    </div>
<?php include("include/footer.php"); ?>