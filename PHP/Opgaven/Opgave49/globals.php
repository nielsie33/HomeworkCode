<?php 
// superglobal scope
$GLOBALS['url'] = "www.mijndomeinnaam.nl";

function doneren($bedrag) {
	// function scope
	$melding = "GIRO 555";
	echo "<br>" . $melding;
	echo "<br>URL: " . $GLOBALS["url"];
	echo "<br>Bedrag: " . $bedrag;
}
doneren(100);
?>