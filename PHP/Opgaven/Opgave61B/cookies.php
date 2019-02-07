<?php
	ob_start();
	echo "Maak een cookie";
	setcookie("gebruiker", "sanskrit", mktime(0,0,0,1,1,2050));
	$gebruiker = $_COOKIE["gebruiker"];
	echo "<br>Gebruikersnaam is: $gebruiker<br>";
	print_r($_COOKIE);
	ob_end_flush();
?>