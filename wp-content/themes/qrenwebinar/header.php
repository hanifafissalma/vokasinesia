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

<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo("template_directory"); ?>/img/favicon.png">

<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo("template_directory"); ?>/img/favicon.png">

<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo("template_directory"); ?>/img/favicon.png">



<meta charset="<?php bloginfo( 'charset' ); ?>" />



<meta name="Robots" content="index,follow" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/animations.css">
    <!--[if lte IE 9]>
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/animations-ie-fix.css">
	<![endif]-->
    
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?<?php echo(rand(1,9999999)); ?>" />
    
    <script src="https://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.7.2.js"></script>

<?php wp_head(); ?>



</head>



<body>



<div class="container">



<div class="toparea">

	<div class="row">

    	<div class="col-6 logo-qren"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo-qren.png" alt="Logo Qren Payment"></a></div>

    	<div class="col-6 logo-telkom"><a href="https://telkom.co.id/sites"><img src="<?php bloginfo('template_directory'); ?>/img/logo-telkom.png" alt="Logo Telkom Indonesia"></a></div>

    </div>

</div>

    

