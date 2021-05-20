<?php get_header(); ?>

<?php if (in_category(array( 1,2,3,4,5,6 ))) : ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="display-inner">
        	<div class="container">
            	<div class="row justify-content-center">
                	<div class="col-md-11">
                    	<div class="row">
                            <div class="col-md-9">
                                <div class="display-inner-text">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </div>
                            <div class="col-md-3">    
                                <div class="display-inner-text">                        
                            		<a href="<?php the_field('upload_file'); ?>" class="btn btn-custom btn-lg"><i class="fa fa-file-pdf"></i> Download PDF</i></a>
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

                            <table class="table tabel-arsip-okupasi">
                              <thead>
                                <tr>
                                  <th width="30%">Nama</th>
                                  <th width="70%">Uraian</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Bidang Prioritas</td>
                                  <td><?php the_field('bidang_prioritas'); ?></td>
                                </tr>
                                <tr>
                                  <td>Nama Skema</td>
                                  <td><?php the_field('nama_skema'); ?></td>
                                </tr>
                                <tr>
                                  <td>Jenis Skema</td>
                                  <td><?php the_field('jenis_skema'); ?></td>
                                </tr>
                                <tr>
                                  <td>Nomor Skema</td>
                                  <td><?php the_field('nomor_skema'); ?></td>
                                </tr>
                                <tr>
                                  <td>Unit Kompetensi</td>
                                  <td><div class="table-blank"><?php the_field('unit_kompetensi'); ?></div></td>
                                </tr>
                              </tbody>
                            </table>                       
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
                            
		<?php endwhile; else: ?>                            
        <?php endif; ?> 

<?php elseif (in_category('14')) : ?>

    <div class="display-inner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="display-inner-text">
                                    <h1><?php the_title(); ?></h1>
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
                    <div class="col-md-7 mb-5">
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php the_field('video_link'); ?>" allowfullscreen></iframe>
                        </div>   
                    </div>
                    <div class="col-md-4">
                        <div class="arsip-block-lainnya">
                            <h4><strong>Video Lainnya</strong></h4>
                            <?php $wpse63027_posts = new WP_Query( array(
                                'category_name'  => 'galeri-video',
                                'posts_per_page' => 5,
                                'post__not_in'   => array( get_queried_object_id() ), // Exclude current post ID (works outside the loop)
                                )); ?>
                                <?php if ( $wpse63027_posts->have_posts()) {
                                while( $wpse63027_posts->have_posts()) {
                                $wpse63027_posts->the_post(); ?>
                                <div class="list-related">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <div class="row">
                                        <div class="col-4">
                                            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                                        </div>
                                        <div class="col-8">
                                            <?php the_title(); ?>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            <?php }} ?>                                             
                        </div>            
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
                                    <h1><?php the_title(); ?></h1>
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
                            <?php the_content(); ?>                                                   
                        </div>            
                    </div>
                </div>
            </div>
        </div>
        
<?php endif; ?>

<?php get_footer(); ?>