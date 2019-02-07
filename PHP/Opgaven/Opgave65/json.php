<?php
	$user = array(
		"naam" => "Shyam",
		"email" => "shyan@nu.nl",
		"wachtwoord" => "",
		"photo" => "shyam.jpg"
	);
	echo "<br>userArray: <br>";
	var_dump($user, true);
	$userJsonString = json_encode($user);
	echo "<br>userJsonLiteral: <br>".$userJsonString;
	echo "<br><br>";

	$boekenJsonLiteral = '[
	{"titel":"Stoner","auteur":"John Williams",
	"genre":"fictie","prijs":19.99},
	{"titel":"De Cirkel","auteur":"Dave Eggers",
	"genre":"fictie","prijs":22.5},
	{"titel":"Stoner","auteur":"Julio Cortazar",
	"genre":"fictie","prijs":25.5}]';
	
	$boeken = json_decode($boekenJsonLiteral,true);
	
	foreach($boeken as $boek) {
		echo "<br>titel: ".$boek["titel"];
		echo "<br>auteur: ".$boek["auteur"];
		echo "<br>genre: ".$boek["genre"];
		echo "<br>prijs: ".$boek["prijs"];
	}
	
	echo "<br><br><br>---- Opgave 65";
	$boekenObj = json_decode($boekenJsonLiteral);
	
	foreach($boekenObj as $boek) {
		echo "<br>titel: ".$boek->titel;
		echo "<br>auteur: ".$boek->auteur;
		echo "<br>genre: ".$boek->genre;
		echo "<br>prijs: ".$boek->prijs;
	}
?>