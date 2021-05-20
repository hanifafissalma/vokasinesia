<?php include("include/m.i.s.c.php"); ?> 
<?php 
    $title = "Arsip ".ucwords($_GET['subtype']);
    $pKontak  = getContactSettings();
    $pUmum    = getPengaturanUmum();
?>
<?php
if( (!isset($_GET['p'])) || ($_GET['p']=="")){ $_GET['p']=1; }
    $total = totaldDataPost('data', rClean($_GET['subtype']));
    $paging = halaman($_GET['p'], 10, $total);
    $data = listDataPost($_GET['p'], 10, 'data', rClean($_GET['subtype']));
?>
<?php include("include/header.php"); ?>

    <div class="archive">
        <div class="box-title d-flex align-items-center">
            <div class="container">
                <h1 class="head-title mb-0"><?= strtoupper(ucwords(rClean($_GET['subtype']))) ?></h1>
            </div>
        </div>
        <br/><br/>
        <div class="container wrapper">
        	<div class="archive-content">
                <div class="row">
                    <div class="col-md-8">
                    	<div class="archive-whitearea">                        
                        	<!-- UMUM -->
                            <?php foreach ($data as $key => $value): ?>
                            <div class="archive-whitearea-box">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="archive-whitearea-box-inner">
                                        <img src="images/post/<?= $data[$key]['img'] ?>" alt="<?= $data[$key]['post_title'] ?>">
                                        <div class="archive-vid-overlay"><i class="fa fa-eye"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                    	<div class="archive-whitearea-box-title"><h2><a href="<?= $data[$key]['type'] ?>/<?= $data[$key]['post_slug'] ?>" ><?= $data[$key]['post_title'] ?></a></h2></div>
                                        <div class="archive-whitearea-box-misc">
                                                <i class="fa fa-calendar text-red"></i> <?= toViewDate($data[$key]['date_create']) ?>
                                            <?php if($data[$key]['comment']==1): ?>
                                                <i class="fa fa-comment ml-4 text-red"></i>
                                                <?= countComment($data[$key]['id']) ?>
                                                 Komentar
                                            <?php endif; ?>
                                        </div>
                                	</div>
                                </div>
                            </div>
                            <?php
                                endforeach;
                            ?>

                            <div class="archive-whitearea-pagination">
                              <ul class="pagination justify-content-center">
                                <?php
                                $page = $_GET['p'];

                                if($page == 1)
                                { // Jika page adalah page ke 1, maka disable link PREV
                                    $depan = '<li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>';
                                }
                                else
                                { // Jika page bukan page ke 1
                                    $link_prev = ($page > 1)? $page - 1 : 1;
                                    $depan = '<li class="page-item">
                                                    <a class="page-link" href="arsip/'.rClean($_GET['subtype']).'/'.$link_prev.'/" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>';

                                }
                                echo $depan;

                                $jumlah_page =  $paging[1]; // Hitung jumlah halamannya
                                $jumlah_number = 2; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                                $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                            

                                for($i=$start_number;$i<=$end_number;$i++)
                                {              
                                $link_active = ($page == $i)? ' disabled' : '';
                                ?>
                                <li class="page-item <?php echo $link_active; ?>"><a class="page-link" href="arsip/<?php echo rClean($_GET['subtype']); ?>/<?php echo $i; ?>/"><?php echo $i; ?></a></li>
                                <?php                 
                                }

                                if($page == $jumlah_page){ // Jika page terakhir
                                    $ekor ='<li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </li>';
                                }else{ // Jika Bukan page terakhir
                                    $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                                    $ekor ='<li class="page-item">
                                                <a class="page-link" href="arsip/'.rClean($_GET['subtype']).'/'.$link_next.'/" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                                </a>
                                            </li>';
                                }
                                echo $ekor;
                                ?>
                              </ul>
                            </div>
                             
	                    </div>
                        
    				</div>
                    <div class="col-md-4">
                        <!--
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
                        	<h3>Kategori Arsip</h3>
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