<?php get_header(); ?>

<?php if (in_category(array( 1,2,3,4,5,6 ))) : ?>

        <div class="display-inner">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">
                    	<div class="row">
                            <div class="col-md-12">
                                <div class="display-inner-text">
                                    <h1>Hasil Pencarian<h1>
                                    <h2>(<?php echo $wp_query->found_posts; ?> Data)</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="arsip-block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <?php wpcfs_show_preset("1"); ?>
                        <div class="arsip-block-list">
                            <table class="table tabel-arsip-okupasi" id="tabelbidang">
                              <thead>
                                <tr>
                                  <th width="50%">Nama Skema</th>
                                  <th>Jenis Skema</th>
                                  <!--<th>Nomor Skema</th>-->
                                  <th class="no-sort">Detail</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <tr>
                                  <td><?php the_field('nama_skema'); ?></td>
                                  <td><?php the_field('jenis_skema'); ?></td>
                                  <!--<td><?php the_field('nomor_skema'); ?></td>-->
                                  <!--<td><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Selengkapnya &rarr;</a></td>-->
                                  <td><a href="<?php the_field('upload_file'); ?>"><i class="fa fa-file-pdf"></i> Download PDF</i></a></td>
                                </tr>
                                <?php endwhile; else: ?>
                                Data tidak ditemukan
            					<?php endif; ?>
                              </tbody>
                            </table>                            
                        </div>
                        
                        <!--
						<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                        <div class="left"><?php previous_posts_link(__('&larr; Newer Entries')) ?></div>
                        <div class="right"><?php next_posts_link(__('Older Entries &rarr;')) ?></div>
                        <?php } ?> 
                        -->    

                    </div>
                </div>
            </div>
        </div>

<?php else: ?>

		<div class="display-inner">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">
                    	<div class="row">
                            <div class="col-md-12">
                                <div class="display-inner-text">
                                    <?php if (is_category()) { ?>
                                    <h1><?php echo single_cat_title(); ?></h1>
                                    <?php } elseif (is_day()) { ?>
                                    <h1>Archive for: <?php the_time('F jS, Y'); ?></h1>
                                    <?php } elseif (is_month()) { ?>
                                    <h1>Archive for: <?php the_time('F, Y'); ?></h1>
                                    <?php } elseif (is_year()) { ?>
                                    <h1>Archive for: <?php the_time('Y'); ?></h1>
                                    <?php } elseif (is_author()) { ?>
                                    <h1>Archive for: <?php the_author(); ?> </h1>
                                    <?php } elseif (is_tag()) { ?>
                                    <h1><?php echo single_tag_title('', true); ?></h1>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="arsip-block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="arsip-block-list">
                        	<div class="row">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   
							
                            <div class="col-md-3">
                            	<div class="arsip-block-box">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<div class="stacked"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
                                    <?php the_title(); ?>
                                </a>
                            	</div>
							</div>
                            
							<?php endwhile; else: ?>
                            Data tidak ditemukan
                            <?php endif; ?>     
                            </div>               
                        </div>
                        
            
						<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                        <div class="left"><?php previous_posts_link(__('&larr; Newer Entries')) ?></div>
                        <div class="right"><?php next_posts_link(__('Older Entries &rarr;')) ?></div>
                        <?php } ?> 
            
                    </div>
                </div>
            </div>
        </div>
        
<?php endif; ?>

<?php get_footer(); ?>