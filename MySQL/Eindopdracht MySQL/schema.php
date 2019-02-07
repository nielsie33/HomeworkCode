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
  <li><a href="about.php">About</a></li>
  <li><a href="formulier.php">Klacht indienen</a></li>
  <li><a href="schema.php" class="active">Klachten Schema</a></li>
</ul>
<h1><center>Overzicht Schiphol Meldpunt.</h1></center>
<h4><center>Gerangschikt op postcode, datum en tijd.</h4></center>
<?php
	$dbhost = "localhost";
	$dbname = "eindopdracht";
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
	$query = "SELECT * FROM klachtsoort,klacht WHERE ID_klachtsoort = klachtsoort.ID;";
	$klachten = $database->prepare($query);
	try {
		$klachten->execute(array());
		$klachten->setFetchMode(PDO::FETCH_ASSOC);
		echo "<center><table id='klachten'>
			<th>Nr</th>
			<th>Postcode</th>
			<th>Datum en tijd</th>
			<th>Klachtsoort</th>";
		foreach($klachten as $klacht) {
			echo "<tr><td>".$klacht["ID"]."&nbsp;&nbsp; </td>";
			echo "<td>".$klacht["postcode"]."&nbsp;&nbsp; </td>";
			echo "<td>".$klacht["datum"]."&nbsp;&nbsp; </td>";
			echo "<td>".$klacht["klachtsoort"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen klachten gevonden.');</script>";
	}
	
	$query = "SELECT COUNT(ID_klachtsoort) AS MilieuTotaal FROM klacht WHERE ID_klachtsoort = 1;";
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
	}
?>
<br><br>
</body>
</html>