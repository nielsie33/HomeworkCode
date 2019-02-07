<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type"
	content="text/html";
	charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		<?php include 'style.css'; ?>
	</style>
</head>
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="autoform.php">Auto formulier</a></li>
  <li><a href="klantform.php">Klanten formulier</a></li>
  <li><a href="autoschema.php">Auto Schema</a></li>
  <li><a href="klantschema.php" class="active">Klant Schema</a></li>
    <li><a href="verkochtschema.php">Verkocht Schema</a></li>
	<li><a href="alfabetisch.php">Alfabetisch Schema</a></li>
	<li><a href="namenschema.php">Namen Schema</a></li>
	<li><a href="getallenschema.php">Getallen Schema</a></li>
</ul>
<h1><center>Overzicht</h1></center>
<?php
	$dbhost = "localhost";
	$dbname = "db_car_sales";
	$user = "root";
	$pass = "";
	try {
		$database = new
		PDO("mysql:host=$dbhost;dbname=$dbname", $user, $pass);
		$database->setAttribute
		(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
		echo "<br />Verbinding NIET gemaakt";
	}
	$query = "SELECT merk, model, fk_id_klant, voornaam, achternaam
FROM car_data
INNER JOIN klant_contact
ON car_data.fk_id_klant = klant_contact.id_klant;";
	$auto = $database->prepare($query);
	try {
		$auto->execute(array());
		$auto->setFetchMode(PDO::FETCH_ASSOC);
		echo "<center><table id='klachten'>
			<th>Merk</th>
			<th>Model</th>
			<th>Klantnummer</th>
			<th>Naam</th>
			<th>Achternaam</th>";
		foreach($auto as $au) {
			echo "<tr><td>".$au["merk"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["model"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["fk_id_klant"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["voornaam"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["achternaam"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen klanten gevonden.');</script>";
	}

?>
<br><br>
</body>
</html>