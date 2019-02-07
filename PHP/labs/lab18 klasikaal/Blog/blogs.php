<?php
session_start();

function blogopslaan($bericht) {
	$bericht = trim($bericht) . "\n";
	$bestand=fopen("blogs.txt", "a");
	fwrite($bestand, $bericht, strlen($bericht));
	fclose($bestand);
}

function toonblogs() {
	// open bestand
	$bestand=fopen("blogs.txt", "r");
	
	// lees bestand
	while(!feof($bestand)) {
		$regel = fgets($bestand);
		echo $regel . "<br>";
	}
	
	// sluit bestand
	fclose($bestand);
}

// Als submit
if(isset($_POST["submit"])) {
	
// bericht toevoegen aan blogs.txt
blogopslaan($_POST['text']);
}
// toon alle blogs
toonblogs();
?>