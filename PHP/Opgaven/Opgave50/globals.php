<?php 
// superglobal scope
$GLOBALS['url'] = "www.mijndomeinnaam.nl";
// globale scope
global $email;
$email = "webmaster@mijndomeinnaam.nl";

function doneren($bedrag) {
	// function scope
	$melding = "GIRO 555";
	echo "<br>" . $melding;
	echo "<br>URL: " . $GLOBALS["url"];
	echo "<br>Bedrag: " . $bedrag;
	global $email;
	echo "<br>E-mail: " . $email;
}
doneren(200);
?>