<?php
if(isset($_POST["submit"]) ){
	if(empty($_POST["achternaam"]) ){
		echo "achternaam niet ingevuld";
	}
	elseif(empty($_POST["voornaam"]) ){
		echo "voornaam niet ingevuld";
	}
	elseif(empty($_POST["adres"]) ){
		echo "adres niet ingevuld";
	}
	elseif(empty($_POST["postcode"]) ){
		echo "postcode niet ingevuld";
	}
	elseif(empty($_POST["emailadres"]) ){
		echo "emailadres niet ingevuld";
	}
	else{
		$achternaam = $_POST["achternaam"];
		$voornaam = $_POST["voornaam"];
		$adres = $_POST["adres"];
		$postcode = $_POST["postcode"];
		$woonplaats = $_POST["woonplaats"];
		$emailadres = $_POST["emailadres"];
		$opleiding = $_POST["opleiding"];
		echo "<h1>Uw gegevens zijn</h1><br><br><br>";
		echo "Achternaam: $achternaam<br>";
		echo "Voornaam: $voornaam<br>";
		echo "Adres: $adres<br>";
		echo "Postcode: $postcode<br>";
		if($woonplaats == "Terneuzen") {
			echo "Plaats: $woonplaats<br>";
		}
		elseif($woonplaats == "Axel") {
			echo "Plaats: $woonplaats<br>";
		}
		elseif($woonplaats == "Sluiskil") {
			echo "Plaats: $woonplaats<br>";
		}
		else{
			echo "plaats niet ingevuld<br>";
		}
		echo "E-mailadres: $emailadres<br><br><br><br>";
		if($opleiding == "ICT") {
			echo "ICT opleidingen zijn vol. Kies een andere opleiding";
		}
		elseif($opleiding == "Engels") {
			echo "U wordt ingeschreven voor de volgende opleiding: " . $opleiding;
		}
		elseif($opleiding == "Techniek") {
			echo "U wordt ingeschreven voor de volgende opleiding: " . $opleiding;
		}
		elseif($opleiding == "Nederlands") {
			echo "U wordt ingeschreven voor de volgende opleiding: " . $opleiding;
		}
		else{
			echo "opleiding niet ingevuld";
		}
	}
}
?>