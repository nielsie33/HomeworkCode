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
?>