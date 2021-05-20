<?php get_header(); ?>

<?php query_posts($query_string.'&posts_per_page=5&cat=7'); ?>          
        
        <div class="display">  
            <div class="display-text"><div><h1>Skema Sertifikasi<br>Kompetensi Nasional Vokasi</h1><h2>(Level 5 dan 6)</h2></div></div>            
            <div class="display-content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            	<div><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
            	<!--<div class="display-text"><div><?php the_content(); ?></div></div>-->
                <?php endwhile; else: ?>
                <?php endif; ?>  
            </div>    
        </div>
        
<?php wp_reset_query(); ?> 

		<div class="sec sec-gray">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">
                    	<div class="row">
                        	<div class="col-md-7 urut2">
                            	<div class="sec-txt">
								<?php
                                $ids = array(2); 
                                query_posts(array('post_type' => 'page',
                                'post__in' => $ids) );
                                ?>
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                <?php endwhile; else: ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>    
                                </div>                          
                            </div>
                        	<div class="col-md-5 urut1">
                            	<img src="https://images.unsplash.com/photo-1512314889357-e157c22f938d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=751&q=80" />
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
		</div>
        
        <div class="sec sec-wh">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">
                    	<div class="row">
                        	<div class="col-md-5 urut1">
                            	<img src="https://images.unsplash.com/photo-1500930540495-e92875696a16?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=764&q=80" />
                            </div>
                        	<div class="col-md-7 urut2">
                            	<div class="sec-txt">
								<?php
                                $ids = array(42); 
                                query_posts(array('post_type' => 'page',
                                'post__in' => $ids) );
                                ?>
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                <?php endwhile; else: ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>   
                                </div>                           
                            </div>
                        </div>
                	</div>
				</div>                    
            </div>
        </div>
        
        <div class="sec sec-red">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">
                        <h3>Bidang Fokus Pekerjaan</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-2 col-6">
                                <div class="cat-item">    
                                <a href="<?php echo get_home_url(); ?>/category/permesinan" title="">
                                <i class="fa fa-gear"></i>
                                <strong>Permesinan</strong><br />(Machinery)
                                </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="cat-item">    
                                <a href="<?php echo get_home_url(); ?>/category/konstruksi" title="">
                                <i class="fa fa-building"></i>
                                <strong>Konstruksi</strong><br />(Construction)
                                </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="cat-item">    
                                <a href="<?php echo get_home_url(); ?>/category/ekonomi-kreatif" title="">
                                <i class="fa fa-coins"></i>
                                <strong>Ekonomi Kreatif</strong><br />(Creative Economy)
                                </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="cat-item">    
                                <a href="<?php echo get_home_url(); ?>/category/hospitalitas" title="">
                                <i class="fa fa-concierge-bell"></i>
                                <strong>Hospitalitas</strong><br />(Hospitality)
                                </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="cat-item">    
                                <a href="<?php echo get_home_url(); ?>/category/layanan-perawatan" title="">
                                <i class="fa fa-wheelchair"></i>
                                <strong>Layanan Perawatan</strong><br />(Care Service)
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>
            </div>
        </div>

		<div class="sec sec-wh">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">		
                    	<div class="row">
                        	<div class="col-md-7 urut2">
                            	<div class="sec-txt">
								<?php
                                $ids = array(44); 
                                query_posts(array('post_type' => 'page',
                                'post__in' => $ids) );
                                ?>
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                <?php endwhile; else: ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>  
                                </div>                            
                            </div>
                        	<div class="col-md-5 urut1">
                            	<img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=387&q=80" />
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
		</div>
        
        <div class="sec sec-gray tahapan-penyusunan-skema">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">
                    	<div class="row">
                        	<div class="col-md-12">
                            	<div class="sec-txt text-center">
								<?php
                                $ids = array(48); 
                                query_posts(array('post_type' => 'page',
                                'post__in' => $ids) );
                                ?>
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                <?php endwhile; else: ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?> 
                                </div>                             
                            </div>
                        </div>
                	</div>
				</div>                    
            </div>
        </div>

        <?php query_posts($query_string.'posts_per_page=9&cat=14'); ?>	
        <div class="sec sec-wh video">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                    <h3>Video Skema Kompetensi</h3>     
                        <div class="row justify-content-center video-content">
                        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="col-md-4 text-center">
                                <div class="embed-responsive embed-responsive-16by9">
                                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php the_field('video_link'); ?>" allowfullscreen></iframe>
                                </div>
                            </div>
			                <?php endwhile; else: ?>
			                <div class="col-12 text-center">Video belum tersedia</div>
			                <?php endif; ?> 
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
        <?php wp_reset_query(); ?> 


		<div class="sec sec-gray">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">		
                    	<div class="row justify-content-center">
                            <div class="col-md-2 col-6">
                                <div class="logo-item">    
                                <a href="https://www.kemdikbud.go.id/main/" title="Website Resmi Kementerian Pendidikan dan Kebudayaan Republik Indonesia">
                                <img src="<?php bloginfo('template_directory'); ?>/images/logo-kemendikbud.png" />
                                Kementerian Pendidikan dan Kebudayaan
                                </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="logo-item"> 
                                <a href="https://bnsp.go.id/" title="Website Resmi Badan Nasional Sertifikasi Profesi">
                                <img src="<?php bloginfo('template_directory'); ?>/images/logo-bnsp.png" />
                                Badan Nasional Sertifikasi Profesi
                                </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="logo-item">   
                                <a href="https://www.bappenas.go.id/id/" title="Website Resmi Kementerian Perencanaan Pembangunan Nasional Republik Indonesia/Badan Perencanaan Pembangunan Nasional">
                                <img src="<?php bloginfo('template_directory'); ?>/images/logo-bappenas.png" />
                                Badan Perencanaan Pembangunan Nasional
                                </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="logo-item">    
                                <a href="https://kadin.id/" title="Website Resmi Kamar Dagang dan Industri Indonesia">
                                <img src="<?php bloginfo('template_directory'); ?>/images/logo-kadin.png" />
                                Kamar Dagang dan Industri Indonesia
                                </a>
                                </div>
                            </div>
                        </div>                  
                    </div>
                </div>
            </div>
		</div>

<?php get_footer(); ?>