<?php add_theme_support( 'post-thumbnails' ); ?>
<?php add_theme_support( 'custom-header' ); ?>

<?php
//Fix posts pagination with normal loop on index.php (custom made)
add_action('pre_get_posts', function($q) {
	if ($q->is_home() && $q->is_main_query() ) {
		$q->set( 'posts_per_page', 2 );
		$q->set( 'cat', 2 );
	}
});
?>

<?php
//Register Sidebar
if(function_exists('register_sidebar')){
 	register_sidebar(array('name' => 'sidebar 1'));
	register_sidebar(array('name' => 'sidebar 2'));
}
?>

<?php
// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'Banana' ),
) );

// Filters to remove thumbnail dimensions
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

//Add placeholder and bootstrap classes to search bar
function html5_search_form( $form ) { 
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('',  'domain') . '</label>
	<input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search ..." />
    <input type="submit" class="btn btn-dark" id="searchsubmit" value="'. esc_attr__('', 'domain') .'" />
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'html5_search_form' );

//Shortcodes
function recent_posts_function($atts){
   extract(shortcode_atts(array(
      'posts' => 1,
   ), $atts));

   $return_string = '<ul>';
   query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => $posts));
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
      endwhile;
   endif;
   $return_string .= '</ul>';

   wp_reset_query();
   return $return_string;
}

//Shortcode Hook
function register_shortcodes(){
   add_shortcode('recent-posts', 'recent_posts_function');
}
add_action( 'init', 'register_shortcodes');

// Creates Banana Reviews Custom Post Type
function banana_reviews_init() {
    $args = array(
      'label' => 'Banana Reviews',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'banana-reviews'),
        'query_var' => true,
        'menu_icon' => 'dashicons-feedback',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
    register_post_type( 'banana-reviews', $args );
}
add_action( 'init', 'banana_reviews_init' );
?>