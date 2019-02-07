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
  <li><a href="klantschema.php">Klant Schema</a></li>
  <li><a href="verkochtschema.php">Verkocht Schema</a></li>
  <li><a href="alfabetisch.php">Alfabetisch Schema</a></li>
  <li><a href="namenschema.php">Namen Schema</a></li>
  <li><a href="getallenschema.php" class="active">Getallen Schema</a></li>
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
	
	$query = "SELECT COUNT(id_klant) AS klanttotaal FROM klant_contact;";
	$totaleklant = $database->prepare($query);
	try {
		$totaleklant->execute(array());
		$totaleklant->setFetchMode(PDO::FETCH_ASSOC);
		echo "<br><center><table id='klachten2'>
			<th>Aantal klanten</th>";
		foreach($totaleklant as $klant) {
			echo "<tr><td>".$klant["klanttotaal"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen gevonden.');</script>";
	}
	
	$query = "SELECT COUNT(id_auto) AS autototaal FROM car_data;";
	$totalauto = $database->prepare($query);
	try {
		$totalauto->execute(array());
		$totalauto->setFetchMode(PDO::FETCH_ASSOC);
		echo "<br><center><table id='klachten2'>
			<th>Aantal auto's</th>";
		foreach($totalauto as $auto) {
			echo "<tr><td>".$auto["autototaal"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen gevonden.');</script>";
	}
	
	$query = "SELECT COUNT(merk) AS autototaal1 FROM car_data WHERE merk = 'Ford';";
	$totalauto1 = $database->prepare($query);
	try {
		$totalauto1->execute(array());
		$totalauto1->setFetchMode(PDO::FETCH_ASSOC);
		echo "<br><center><table id='klachten2'>
			<th>Aantal FORD</th>";
		foreach($totalauto1 as $auto1) {
			echo "<tr><td>".$auto1["autototaal1"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen gevonden.');</script>";
	}
	
	$query = "SELECT COUNT(merk) AS autototaal2 FROM car_data WHERE merk = 'Mercedes';";
	$totalauto2 = $database->prepare($query);
	try {
		$totalauto2->execute(array());
		$totalauto2->setFetchMode(PDO::FETCH_ASSOC);
		echo "<br><center><table id='klachten2'>
			<th>Aantal MERCEDES</th>";
		foreach($totalauto2 as $auto2) {
			echo "<tr><td>".$auto2["autototaal2"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen gevonden.');</script>";
	}
	
	$query = "SELECT COUNT(merk) AS autototaal3 FROM car_data WHERE merk = 'Opel';";
	$totalauto3 = $database->prepare($query);
	try {
		$totalauto3->execute(array());
		$totalauto3->setFetchMode(PDO::FETCH_ASSOC);
		echo "<br><center><table id='klachten2'>
			<th>Aantal OPEL</th>";
		foreach($totalauto3 as $auto3) {
			echo "<tr><td>".$auto3["autototaal3"]."&nbsp;&nbsp; </td></tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen gevonden.');</script>";
	}

?>
<br><br>
</body>
</html>