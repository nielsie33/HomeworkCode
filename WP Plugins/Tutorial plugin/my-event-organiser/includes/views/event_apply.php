<?php
echo 'event_apply.php'; // xxx = pagina naam (e.g event_add)
?>
<?php 
if ( function_exists('current_user_can') &&
!current_user_can('ivs_meo_event_update') )
	die(__(' Cheatin&#8217; uh?', 'my_event_organiser'));
?>