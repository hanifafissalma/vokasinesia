<?php

register_sidebar( array(
    'id'          => 'right-sidebar',
    'name'        => __( 'Sidebar Kanan', $text_domain ),
    'description' => __( 'Sidebar sebelah kanan.', $text_domain ),
	'before_widget' => '<div class="listing-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="separator"><h3>',
	'after_title'   => '</h3></div>',
) );

function get_custom_field_value($szKey, $bPrint = false) {
	global $post;
	$szValue = get_post_meta($post->ID, $szKey, true);
	if ( $bPrint == false ) return $szValue; else echo $szValue;
}

function showallpost_pre_get_posts( $query ) {
  if ( ( $query->is_author() || $query->is_category() || $query->is_search() ) && $query->is_main_query() ) {
    $query->set( 'posts_per_page', -1 );
  }
}
add_action( 'pre_get_posts', 'showallpost_pre_get_posts' );

function wcs_exclude_category_search( $query ) {
  if ( is_admin() || ! $query->is_main_query() )
    return;
  if ( $query->is_search ) {
    $query->set( 'cat', '1' );
  }
}
add_action( 'pre_get_posts', 'wcs_exclude_category_search', 1 );

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
add_image_size( 'img-big', 1024, 768, array('center','center'));
add_image_size( 'img-single', 1024, 500, array('center','center'));
add_image_size( 'img-single2', 1024, 200, array('center','center'));
add_image_size( 'img-x', 800, 600, array('center','center'));
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
} 

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}

function remove_footer_admin () {
	echo '&copy; Mitras DUDI';
}
add_filter('admin_footer_text', 'remove_footer_admin');


function annointed_admin_bar_remove() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() {
    $defaults = array(
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

function custom_login_logo() {
	echo '<style type="text/css">
  body { background: #2E779E; }
  a { color: #FFF !important; }
	#login { padding-top: 2em !important; }
	h1 a { width: 100% !important; height: 150px !important; background-size: 100px !important; background-image: url('.get_bloginfo('template_directory').'/images/logo-mitras-wh.png) !important; }
	#backtoblog { display: none; }
	</style>';
}
add_action('login_head', 'custom_login_logo');

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Alivedata.io';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
		
?>