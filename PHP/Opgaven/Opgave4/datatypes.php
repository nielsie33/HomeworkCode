<?php
	$naam = "Carl";
	$adres = "Kruislaan 111";
	$woonplaats = "Utrecht";
	
	$naw = $naam . " " . $adres . " " . $woonplaats;
	echo "Gegevens: $naw";
	
echo <<<TEKST
<br>Salarisspecificatie van $naam: 2000 euro
<br>Maand: November
<br>Jaar: 2020
TEKST;
?>