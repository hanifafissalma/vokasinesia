<?php get_header(); ?>



<?php query_posts($query_string.'&posts_per_page=3&cat=1'); ?>  

<div class="contentarea">

	<div class="row animatedParent">    

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	

    	<div class="col-md-4 animated bounceInUp">

        	<div class="card content-box">

            	<div class="content-box-img"><a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></a></div>

                <div class="content-box-content">

                    <div class="content-box-title"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>

                    <div class="content-box-text"><?php echo excerpt(30); ?></div>

                    <div class="content-box-more"><a href="<?php the_permalink(); ?>" class="btn btn-custom">Masuk Webinar</a></div>

                </div>

            </div>

        </div>

		<?php endwhile; else: ?>

        <?php endif; ?>

    </div>

</div>

<?php wp_reset_query(); ?> 



<?php get_footer(); ?>