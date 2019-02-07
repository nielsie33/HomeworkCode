<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type"
	content="text/html";
	charset="UTF-8">
</head>
<body>
<?php
	echo "<br />---- Opgave 96: Drivers: ";
	print_r(PDO::getAvailableDrivers());
	
	echo "<br />----Opgave 97: PDO verbinding maken.";
	$dbhost = "localhost";
	$dbname = "webshop";
	$user = "root";
	$pass = "";
	try {
		$database = new
		PDO("mysql:host=$dbhost;dbname=$dbname", $user, $pass);
		$database->setAttribute
		(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "<br />Verbinding gemaakt";
	}
	catch(PDOException $e) {
		echo $e->getMessage();
		echo "<br />Verbinding NIET gemaakt";
	}
	
	echo "<br >----Opgave 98: Input-data vanuit geïndexeerde array";
	$query = "INSERT INTO album (titel, artiest, genre, prijs, voorraad) values (?, ?, ?, ?, ?)";
	$insert = $database->prepare($query);
	$data = array("Stairway to Heaven","Led Zeppelin","Rock","0.99","200");
	try {
		$insert->execute($data);
		echo "<script>alert('Album toegevoegd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Album NIET toegevoegd.');</script>";
	}
	
	echo "<br />----Opgave 99: zelfde insert-query met new data";
	$data = array("The Wall", "Pink Floyd", "Rock", "0.99", "100");
	try {
		$insert->execute($data);
		echo "<script>alert('Album toegevoegd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Album NIET toegevoegd.');</script>";
	}
	
	echo "<br />----Opgave 100: verwijder toegevoegd album";
	$query = "DELETE FROM album WHERE titel = 'The Wall'";
	$delete = $database->prepare($query);
	try {
		$delete->execute();
		echo "<script>alert('Album verwijderd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Album NIET verwijderd.');</script>";
	}
	
	echo "<br />----Opgave 101: verwijder toegevoegd album";
	$query = "DELETE FROM album WHERE titel = 'Stairway to Heaven'";
	$delete = $database->prepare($query);
	try {
		$delete->execute();
		echo "<script>alert('Album verwijderd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Album NIET verwijderd.');</script>";
	}
	
	echo "<br />----Opgave 102: Alle albums selecteren";
	$query = "SELECT * FROM album WHERE 1";
	$albums = $database->prepare($query);
	try {
		$albums->execute(array());
		$albums->setFetchMode(PDO::FETCH_ASSOC);
		foreach($albums as $album) {
			echo "<br />".$album["titel"];
		}
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen albums gevonden.');</script>";
	}
	
	echo "<br />----Opgave 103: Input-data vanuit hash-array";
	$query = "INSERT INTO album (titel, artiest, genre, prijs, voorraad) values(:titel, :artiest, :genre, :prijs, :voorraad)";
	$insert = $database->prepare($query);
	$data = array("titel" => "Let's get it on", "artiest" => "Marvin Gaye", "genre" => "soul", "prijs" => "0.99", "voorraad" => "44");
	try {
		$insert->execute($data);
		echo "<script>alert('Album toegevoegd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Album NIET toegevoegd.');</script>";
	}
	
	echo "<br />----Opgave 104: Zoek album";
	$query = "SELECT titel FROM album WHERE titel = :albumtitel";
	$albums = $database->prepare($query);
	try {
		$albums->execute(array("albumtitel" => "Let's get it on"));
		$albums->setFetchMode(PDO::FETCH_ASSOC);
		foreach($albums as $album) {
			echo "<br />".$album["titel"];
		}
	}
	catch (PDOException $e) {
		echo "<script>alert('Album NIET gevonden.');</script>";
	}
	
	echo "<br />----Opgave 105: Update prijs";
	$query = "UPDATE album SET prijs = ? WHERE titel = ?";
	$update = $database->prepare($query);
	$albumtitel = "Let's get it on";
	$prijs = 0.99;
	$update->execute(array($prijs, $albumtitel));
	
	if($update) {
		echo "<br />De prijs is gewijzigd.";
	}
	
	echo "<br />----Opgave 106: Zoek album";
	$query = "SELECT titel, prijs FROM album WHERE titel = 'Let\'s get it on'";
	$albums = $database->prepare($query);
	$albums->execute(array());
	$albums->setFetchMode(PDO::FETCH_ASSOC);
	if($albums) {
		echo "<script>alert('Album gevonden.');</script>";
		foreach($albums as $album) {
			echo "<br />".$album["titel"] . "Prijs: ".$album["prijs"];
		}
	}
	
	echo "<br />----Opgave 107: Zoek hoogste bestelling";
	$query = "SELECT MAX(aantal) AS MAX FROM item";
	$max = $database->prepare($query);
	$max->execute();
	$maxAantal = $max->fetch(PDO::FETCH_ASSOC);
	echo "<br />Max aantal: ".$maxAantal["MAX"];
?>
</body>
</html>