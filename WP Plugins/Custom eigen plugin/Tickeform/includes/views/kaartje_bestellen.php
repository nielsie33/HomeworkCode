
<?php
/*if ( function_exists('current_user_can') &&
!current_user_can('kaartjes_bestellen') )
	die(__('Geen toestemming', 'tickeform'));*/

// Include the Kaartje class from the model.
require_once TICKEFORM_PLUGIN_MODEL_DIR.'/Kaartje.php';
$kaartje = new Kaartje();

// Get the list with the cards
$kaartje_lijst = $kaartje->getCardList();

// Set timezone default:
date_default_timezone_set('Europe/Amsterdam');

?>

<h2><?php echo __('Kaartjes Bestellen')?></h2>
<p />
<form action="<?php echo $file_base_url; ?>" method="post">
 <table>
 <tr><td><?php echo __('Naam:');?></td><td><input type="text" maxlength=32 placeholder="John van den Berg" name="naam" value="<?php echo $post_inputs['naam']?>"/></td></tr>
 <tr><td><?php echo __('Email:');?></td><td><input type="email" maxlength=50 placeholder="john@gmail.com" name="email" value="<?php echo $post_inputs['email']?>"/></td></tr>
 <tr><td><?php echo __('Adres:');?></td><td><input type="text" maxlength=30 placeholder="Straatnaam 10" name="adres" value="<?php echo $post_inputs['adres']?>"/></td></tr>
 <tr><td><?php echo __('Woonplaats:');?></td><td><input type="text" maxlength=20 placeholder="Amsterdam" name="woonplaats" value="<?php echo $post_inputs['woonplaats']?>"/></td></tr>
 <tr><td><?php echo __('Postcode:');?></td><td><input type="text" maxlength=6 placeholder="0000XX" name="postcode" value="<?php echo $post_inputs['postcode']?>"/></td></tr>
 <tr><td><?php echo __('Datum vandaag:<br />');?></td><td><input type="date" name="datum" value="<?php echo Date("Y-m-d")?>"></input>
<span class="error">
<?php echo $form_result->get_error_message('datum');?></span></td></tr> 
 <tr><td><?php echo __('Selecteer kaartje:');?></td><td><select name="kaartje"><?php
 foreach ($kaartje_lijst as $kaartje_object){
 ?>
 <option value="<?php echo $kaartje_object->getId();?>"><?php
echo $kaartje_object->getKaartjeNaam();
echo"&nbsp;&nbsp;&nbsp;";
echo $kaartje_object->getBeschrijving();?></option>
<?php }
 ?></select></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="add_ticket" value="<?php echo __('Aanmaken');?>" /></td></tr>
</table>
</form>