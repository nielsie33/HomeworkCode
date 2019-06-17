<!DOCTYPE html>
<?php include_once '../config/dbconfig.php'; ?>
<html lang="en">
<head>
	<meta http-equiv="Content-Type"
	content="text/html";
	charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		<?php include '../style.css'; ?>
	</style>
</head>
<body>
<ul>
  <li><a href="../index.php">Home</a></li>
  <li><a href="../pages/gebruikersf.php">Gebruikers</a></li>
  <li><a href="../pages/afsprakenf.php">Afspraken</a></li>
  <li><a href="../pages/huisdierenf.php">Huisdieren</a></li>
  <li><a href="../pages/overzichtafspraken.php" class="active">Afspraken overzicht</a></li>
</ul>
<h1><center>Afspraken</h1></center>
<?php
	$query = "SELECT datum, tijd, klantnaam, naam, soort
		FROM afspraken
		LEFT JOIN klanten ON afspraken.klant_id = klanten.id
		LEFT JOIN huisdieren ON afspraken.huisdier_id = huisdieren.id;";
	$afspraken = $database->prepare($query);
	try {
		$afspraken->execute(array());
		$afspraken->setFetchMode(PDO::FETCH_ASSOC);
		echo "<center><table id='tabel'>
			<th>Datum</th>
			<th>Tijd</th>
			<th>Klant naam</th>
			<th>Dier naam</th>
			<th>Soort</th>";
		foreach($afspraken as $afspraak) {
			echo "<tr>";
			echo "<td>".$afspraak["datum"]."&nbsp;&nbsp; </td>";
			echo "<td>".$afspraak["tijd"]."&nbsp;&nbsp; </td>";
			echo "<td>".$afspraak["klantnaam"]."&nbsp;&nbsp; </td>";
			echo "<td>".$afspraak["naam"]."&nbsp;&nbsp; </td>";
			echo "<td>".$afspraak["soort"]."&nbsp;&nbsp; </td>";
			echo "</tr>";
		}
		echo "</table></center>";
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen afspraken gevonden.');</script>";
	}
?>
<br><br>
</body>
</html>