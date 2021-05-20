<?php include("include/m.i.s.c.php"); ?>
<?php 
    $data = detailPost($_GET['type'], $_GET['slug']);
    $title = $data['post_title'];
    $pKontak  = getContactSettings();
    $pUmum    = getPengaturanUmum();
?>
<?php include("include/header.php"); ?>

    <div class="details">
        <div class="container wrapper">
        	<div class="details-content">
                <div class="row">
                    <div class="col-md-12">
                    <h1 class="h1-nonbg">Sitemap</h1>
                    </div>
                    <div class="col-md-12">
                    	<div class="details-whitearea">
                            <?php
                            $kategori = listCategory();
                            foreach ($kategori as $key => $value):?>
                                <?php if(strtolower($kategori[$key]['category_name'])!="survei"):?>
                                    <div class="sitemap-section">
                                    	<h3><?= $kategori[$key]['category_name'] ?></h3>
                                    		<ul>
                                                <?php $data = listDataSitemap($kategori[$key]['category_name']); 
                                                foreach($data as $key2 => $value2): ?>
                                    			<li><a href="data/<?= $data[$key2]['post_slug'] ?>" title="<?= $data[$key2]['post_title'] ?>"><?= $data[$key2]['post_title'] ?></a></li>
                                    			<?php endforeach;?>
                                    		</ul>
                                    </div>
                                <?php endif;?>
                            <?php endforeach; ?>
	                    </div>                        
    				</div>                    
                </div>   
            </div> 	
    	</div>    	
    </div>
<?php include("include/footer.php"); ?>