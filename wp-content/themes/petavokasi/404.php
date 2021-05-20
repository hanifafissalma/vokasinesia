<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php if (is_home () ) {
    bloginfo('name');
} elseif ( is_category() ) {
    single_cat_title(); echo ' - ' ; bloginfo('name');
} elseif (is_single() ) {
    $customField = get_post_custom_values("title");
    if (isset($customField[0])) {
        echo $customField[0];
    } else {
        single_post_title();
    }
} elseif (is_page() ) {
    bloginfo('name'); echo ' - '; single_post_title();
} else {
    wp_title('',true);
} ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/images/logo-mitrasdudi.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/images/logo-mitrasdudi.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/images/logo-mitrasdudi.png">

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="Robots" content="noindex,nofollow" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<style>
@import url('https://fonts.googleapis.com/css?family=Assistant&display=swap');
body { font-family: 'Assistant', sans-serif; !important; background: #0C0928; color: #FFF; }
.wraper { width: 60%; max-width: 500px; text-align: center; padding: 5em 0 0 0; margin: 0 auto; }
.wraper img { width: 100%; max-width: 500px; }
.wraper h1,
.wraper h2 { text-transform: uppercase; }
.wraper a { color: #d90429; text-decoration: none;  }
.wraper a:hover { color: #2b2d42; text-decoration: none; }
</style>

<?php wp_head(); ?>

</head>
<body>
<div class="wraper">
<div><img src="<?php bloginfo('template_directory'); ?>/images/404.png" style="width:400px;"></div>
<h1>Halaman Tidak Ditemukan</h1>
<h2><a href="<?php echo get_home_url(); ?>">Kembali ke Beranda</a></h2>
</div>

<?php wp_footer(); ?>

</body>
</html>

