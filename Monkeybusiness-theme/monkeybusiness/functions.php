<?php
add_theme_support( 'custom-header' ); 
add_theme_support( 'post-thumbnails' ); 
register_nav_menus(array(
'primary' => 'Primary Navigation'
));?>

<?php
if ( function_exists('register_sidebar') ){

 	register_sidebar(array ( 	'name' => 'sidebar 1' ));
	register_sidebar(array ( 	'name' => 'sidebar 2' ));
	register_sidebar(array ( 	'name' => 'footer-bar 1' ));
}
?>

<?php function recent_posts_function() {
   query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => 1));
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string = '<a href="'.get_permalink().'">'.get_the_title().'</a>';
      endwhile;
   endif;
   wp_reset_query();
   return $return_string;
}


function register_shortcodes(){
   add_shortcode('recent-posts', 'recent_posts_function');
}
add_action( 'init', 'register_shortcodes');
?>