<?php
	echo "<br>------ Opgave 6";
	$producten = [];
	$producten[0] = "Boeken";
	$producten[1] = "CD's";
	$producten[2] = "Smartphones";
	$producten[3] = "DVD's";
	
	echo "<br>------ Opgave 7: ";
	print_r($producten);
	
	echo "<br>------ Opgave 7: var_dump(): ";
	var_dump($producten);
	
	echo "<br>------ Opgave 8: ";
	unset($producten[2]);
	print_r($producten);
	
	echo "<br>------ Opgave 9: ";
	$gevonden = array_key_exists(1, $producten);
	echo "key 1 gevonden?: ".$gevonden;
	
	echo "<br>----- Opgave 10: ";
	$gevonden = in_array('Boeken', $producten);
	echo "Boeken gevonden?: " . $gevonden;
?>