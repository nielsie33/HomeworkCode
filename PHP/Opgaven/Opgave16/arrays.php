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
	
	echo "<br>----- Opgave 11: ";
	$index = array_search("CD's", $producten);
	echo "De index van de CD's is: " . $index;
	
	echo "<br>----- Opgave 12: ";
	array_push($producten, "Laptops", "Tablets");
	print_r($producten);
	
	echo "<br>----- Opgave 13: ";
	$laatsteElement = array_pop($producten);
	echo $laatsteElement . " is verwijderd: ";
	print_r($producten);
	
	echo "<br>----- Opgave 14: ";
	$eersteElement = array_shift($producten);
	echo $eersteElement.' verwijderd: ';
	print_r($producten);
	
	echo "<br>----- Opgave 15: ";
	array_unshift($producten, "TV's", "Stereo's");
	echo "TV's en Stereo's toegevoegd: ";
	print_r($producten);
	
	echo "<br>----- Opgave 16: ";
	$random_keys = array_rand($producten, 2);
	echo "<br/>eerste random product: ".
		$producten[$random_keys[0]];
	echo "<br/>tweede random product: ".
		$producten[$random_keys[1]];
?>