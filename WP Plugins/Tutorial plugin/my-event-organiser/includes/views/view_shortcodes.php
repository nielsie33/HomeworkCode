<?php
/**
*	Description	of	view_shortcodes.php
*
*	@author	gthoogendoorn
*/
//	Add	the	main	view	shortcode
add_shortcode(	'my_event_organiser_main_view',	'load_main_view2');

function load_main_view2( $atts, $content = NULL){

 // Include the main view
 include MY_EVENT_ORGANISER_PLUGIN_INCLUDES_VIEWS_DIR.
'/my_event_organiser_main_view.php';

}
?>