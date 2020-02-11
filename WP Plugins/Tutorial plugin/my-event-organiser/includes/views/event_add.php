<?php
echo 'event_add.php'; // xxx = pagina naam (e.g event_add)
?>	
<?php
if ( function_exists('current_user_can') &&
!current_user_can('ivs_meo_event_create') )
	die(__('Cheatin&#8217; uh?', 'my_event_organiser'));

// Include the Event class from the model.
require_once MY_EVENT_ORGANISER_PLUGIN_MODEL_DIR.'/Event.php';
$event = new Event();
$eventType = new Event();

// Get the list with the event categories
$event_cat_list = $event->getEventCategoryList();

// Get the list with the event types
$event_type_list = $eventType->getEventTypeList();

// Set timezone default:
date_default_timezone_set('Europe/Amsterdam');

?>

<h2><?php echo __('Evenement aanmaken')?></h2>
<p />
<h3><?php echo __('Menu')?></h3>
<form action="<?php echo $file_base_url; ?>" method="post">
 <table>
 <tr><td><?php echo __('Titel:');?></td><td><input type="text" name="title" value="<?php echo $post_inputs['title']?>"/></td></tr>
 
 <tr><td><?php echo __('Selecteer evenement categorie:');?></td><td><select name="cat"><?php
 // Create the category drop down
 foreach ($event_cat_list as $event_cat_obj){
 ?>
 <option value="<?php echo $event_cat_obj->getId();?>"><?php
echo $event_cat_obj->getName();?></option>
<?php }
 ?></select></td></tr>
<tr><td><?php echo __('Selecteer inschrijvingstype:');?></td><td><select name="type">
<?php 
// Create the event type drop down                                
foreach ($event_type_list as $event_type_obj){ 
// set selected if exists 
$selected = ($event_type_obj->getId() == 
$post_inputs['type'])? ' selected="selected" ' : ''; 
?> 
<option value="<?php echo $event_type_obj->getId();?>"<?php echo $selected;?>><?php echo $event_type_obj->getName();?></option> 
<?php } 
?></select></td></tr> 

<tr><td><?php echo __('Evenement datum:<br />');?></td><td><input type="date" name="event_date"></input></td><td>
<span class="error">
<?php echo $form_result->get_error_message('event_date');?></span></td></tr>         
<tr><td> <?php echo __('Eind datum: <br />');?></td><td><input type="date" name="end_date"></input></td><td><span class="error"><?php echo $form_result->get_error_message('end_date'); ?></span></td></tr> 
<tr><td><?php echo __('Uiterlijke inschrijfdatum:');?></td><td><input type="date" name="due_date"></input></td><td><br><span class="error"><?php echo $form_result->get_error_message('due_date');?></span></td></tr> 
<tr><td colspan="2"></td></tr> 
<tr><td><?php echo __('Extra informatie:');?></td><td>
<textarea name="info" rows="4" cols="5" width="512px; height:205px;" style="margin: 0px; width: 390px; height: 212px;"><?php echo $post_inputs['info'];?></textarea></td></tr> 
<tr><td>&nbsp;</td><td><input type="submit" name="add_event" value="<?php echo __('Aanmaken');?>" /></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
</table>
</form>