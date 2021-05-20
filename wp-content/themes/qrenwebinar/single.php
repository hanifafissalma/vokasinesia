<?php get_header(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<div class="singlecontentarea">

	<div class="row animatedParent">

    	<div class="col-12 animated bounceInUp"><h1><?php the_title(); ?></h1></div>

    	<div class="col-lg-6 singlecontentarea-left animated fadeInLeft delay-1000">        

        	<div class="singlecontentarea-video">

            	<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php the_field("youtube"); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        	</div>

        	<div class="singlecontentarea-text">

				<div class="mb-4"><strong><?php the_field("hari"); ?>, <?php the_field("tanggal"); ?> | <?php the_field("jam"); ?> WIB</strong></div>

                <div class="mb-4"><strong><?php the_field("small_text"); ?></strong></div>

                <div class="mb-4"><h3><?php the_field("big_text"); ?></h3></div>

        		<div class="mb-4"><?php the_content(); ?></div>

            </div>

        </div>

    	<div class="col-lg-6 singlecontentarea-right animated fadeInRight delay-2000">

        	<iframe src="https://app.sli.do/event/<?php the_field("slido"); ?>" frameborder="0" height="100%" width="100%" style="min-height: 560px;"></iframe>

        </div>

    </div>

</div> 



<?php endwhile; else: ?>



<?php endif; ?>



<?php get_footer(); ?>