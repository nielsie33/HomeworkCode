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
  <li><a href="autoschema.php" class="active">Auto Schema</a></li>
  <li><a href="klantschema.php">Klant Schema</a></li>
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
	$query = "SELECT * FROM car_data;";
	$auto = $database->prepare($query);
	try {
		$auto->execute(array());
		$auto->setFetchMode(PDO::FETCH_ASSOC);
		echo "<center><table id='klachten'>
			<th>ID</th>
			<th>Merk</th>
			<th>Model</th>
			<th>Bouwjaar</th>
			<th>Kleur</th>
			<th>Inkoopprijs</th>
			<th>klantnummer</th>";
		foreach($auto as $au) {
			echo "<tr><td>".$au["id_auto"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["merk"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["model"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["bouwjaar"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["kleur"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["inkoopprijs"]."&nbsp;&nbsp; </td>";
			echo "<td>".$au["fk_id_klant"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen autos gevonden.');</script>";
	}
	
	/*$query = "SELECT COUNT(ID_klachtsoort) AS MilieuTotaal FROM klacht WHERE ID_klachtsoort = 1;";
	$totaleklachten = $database->prepare($query);
	try {
		$totaleklachten->execute(array());
		$totaleklachten->setFetchMode(PDO::FETCH_ASSOC);
		echo "<h1><center>Totaal aantal klachten.</h1></center>
			<center><table id='klachten2'>
			<th>Milieu</th>";
		foreach($totaleklachten as $klacht) {
			echo "<tr><td>".$klacht["MilieuTotaal"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen milieu klachten gevonden.');</script>";
	}
	
	$query = "SELECT COUNT(ID_klachtsoort) AS VeiligheidTotaal FROM klacht WHERE ID_klachtsoort = 2;";
	$totaleklachten2 = $database->prepare($query);
	try {
		$totaleklachten2->execute(array());
		$totaleklachten2->setFetchMode(PDO::FETCH_ASSOC);
		echo "<br><center><table id='klachten2'>
			<th>Veiligheid</th>";
		foreach($totaleklachten2 as $klacht) {
			echo "<tr><td>".$klacht["VeiligheidTotaal"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen veiligheid klachten gevonden.');</script>";
	}
	
	$query = "SELECT COUNT(ID_klachtsoort) AS GeluidTotaal FROM klacht WHERE ID_klachtsoort = 3;";
	$totaleklachten3 = $database->prepare($query);
	try {
		$totaleklachten3->execute(array());
		$totaleklachten3->setFetchMode(PDO::FETCH_ASSOC);
		echo "<br><center><table id='klachten2'>
			<th>Geluid</th>";
		foreach($totaleklachten3 as $klacht) {
			echo "<tr><td>".$klacht["GeluidTotaal"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen geluid klachten gevonden.');</script>";
	}*/
?>
<br><br>
</body>
</html>