<?php 
// superglobal scope
$GLOBALS['url'] = "www.mijndomeinnaam.nl";
// globale scope
global $email;
$email = "webmaster@mijndomeinnaam.nl";

// globale constanten
define("BIJDRAGE",0.10);

function doneren($bedrag) {
	// function scope
	$melding = "GIRO 555";
	echo "<br>" . $melding;
	echo "<br>URL: " . $GLOBALS["url"];
	echo "<br>Bedrag: " . $bedrag;
	global $email;
	echo "<br>E-mail: " . $email;
	$bijdrage = $bedrag * BIJDRAGE;
	$donatie = $bedrag + $bijdrage;
	echo "<br>Inclusief bijdrage: $donatie";
}
doneren(300);
?>