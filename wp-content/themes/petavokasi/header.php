<!DOCTYPE html>
<html xml:lang="id" xmlns="http://www.w3.org/1999/xhtml" lang="id">
<head>
<title>
<?php if (is_home () ) {
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
} ?>
</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/images/logo-mitrasdudi.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/images/logo-mitrasdudi.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/images/logo-mitrasdudi.png">

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="Robots" content="index,follow" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/vendor/bootstrap.min.css" />

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/datatables.min.css"/>

<!-- Slick -->
<link href="<?php bloginfo('template_directory'); ?>/vendor/slick.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/vendor/slick-theme.css" rel="stylesheet">	
        
<!-- Font -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?<?php echo(rand(1,9999999)); ?>" />

<?php wp_head(); ?>

</head>

<body>

<div class="navigation">
      <div class="nav-container">
        <div class="brand">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo-mitras-wh.png"></a>
        </div>
        <nav>
          <div class="nav-mobile"><a id="nav-toggle"><span></span></a></div>
          <ul class="nav-list">
            <li>
              <a href="<?php echo get_home_url(); ?>">Beranda</a>
            </li>
            <li>
              <a href="<?php echo get_home_url(); ?>/tentang-kami">Tentang</a>
            </li>
            <li>
              <a>Bidang</a>
              <ul class="nav-dropdown">
                <li>
                  <a href="<?php echo get_home_url(); ?>/category/permesinan">Permesinan</a>
                </li>
                <li>
                  <a href="<?php echo get_home_url(); ?>/category/konstruksi">Konstruksi</a>
                </li>
                <li>
                  <a href="<?php echo get_home_url(); ?>/category/ekonomi-kreatif">Ekonomi Kreatif</a>
                </li>
                <li>
                  <a href="<?php echo get_home_url(); ?>/category/layanan-perawatan">Care Service</a>
                </li>
                <li>
                  <a href="<?php echo get_home_url(); ?>/category/hospitalitas">Hospitalitas</a>
                </li>
              </ul>
            </li>
            <li>
              <a>Galeri</a>
              <ul class="nav-dropdown">
                <li>
                  <a href="<?php echo get_home_url(); ?>/category/galeri-foto">Foto</a>
                </li>
                <li>
                  <a href="<?php echo get_home_url(); ?>/category/galeri-video">Video</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="<?php echo get_home_url(); ?>/hubungi-kami">Hubungi Kami</a>
            </li>
            <!--
            <li>
              <form class="search">
                <input type="text" class="search-input" name="" placeholder="Masukan kata kunci">
                <button type="submit" class="search-button"><span>Cari</span></button>
              </form>
            </li>
            -->
          </ul>
        </nav>
	</div>
</div>
    
