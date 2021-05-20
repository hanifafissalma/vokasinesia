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
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo("template_directory"); ?>/img/favicon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo("template_directory"); ?>/img/favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo("template_directory"); ?>/img/favicon.png">

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="Robots" content="noindex,nofollow" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap');
.wraper { width: 80%; max-width: 940px; text-align: center; padding: 5em 0 0 0; margin: 0 auto; }
.wraper img { width: 100%; max-width: 500px; }
.wraper h1 { color: #ED1C24; text-transform: uppercase; font-weight: 700; margin: 1em 0; }
.wraper h2 { font-size: 1.2em; font-weight: normal; }
.wraper a { color: #717171 !important; text-decoration: none;  }
.wraper a:hover { text-decoration: underline; }
</style>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?<?php echo(rand(1,9999999)); ?>" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php wp_head(); ?>

</head>
<body>
<div class="wraper">
<div><img src="<?php bloginfo('template_directory'); ?>/img/404.png" style="width:300px;"></div>
<h1>Halaman Tidak Ditemukan</h1>
<h2><a href="#">Kembali ke Beranda</a></h2>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dd6f59b332.js" crossorigin="anonymous"></script>    
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/all.js"></script>

<?php wp_footer(); ?>

</body>
</html>

