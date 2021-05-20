<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

    <div class="sec sec-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <?php if ( has_post_thumbnail()) : ?>
                        <div>
                            <?php the_post_thumbnail('img-single'); ?>
                        </div>  
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

 <?php endwhile; else: ?>
<?php endif; ?>

<?php get_footer(); ?>