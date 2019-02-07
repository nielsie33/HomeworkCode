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
?>
</body>
</html>