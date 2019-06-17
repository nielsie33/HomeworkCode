<!DOCTYPE html>
<?php include_once '../config/dbconfig.php'; ?>
<?php 
$query = "SELECT * FROM klanten;";
	$klant = $database->prepare($query);
	try {
		$klant->execute(array());
		$klant->setFetchMode(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen klanten gevonden.');</script>";
	}
?>
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
  <li><a href="../pages/huisdierenf.php" class="active">Huisdieren</a></li>
  <li><a href="../pages/overzichtafspraken.php">Afspraken overzicht</a></li>
</ul>
<div class="form-style-6">
<h1>Huisdier inschrijven</h1>
<form name="huisdieraanmaken" action="" method="post">
<select name="klanten">
<?php foreach($klant as $cl) { ?>
	<option value="<?= $cl['id']; ?>"><?= $cl['klantnaam']; ?></option>
<?php } ?>
</select>
<input type="text" name="soort" placeholder="Soort" />
<input type="text" name="ras" placeholder="Ras" />
<input type="text" name="naam" placeholder="Naam" />
<input type="date" name="gebdatum" />
<input type="submit" name="submit" value="Aanmaken" />
</form>
</div>
<?php
$post_array_to_filter = array(
    'submit' => FILTER_SANITIZE_SPECIAL_CHARS,
    'klanten' => FILTER_SANITIZE_SPECIAL_CHARS,
    'soort' => FILTER_SANITIZE_SPECIAL_CHARS,
    'ras' => FILTER_SANITIZE_SPECIAL_CHARS,
    'naam' => FILTER_SANITIZE_SPECIAL_CHARS,
    'gebdatum' => FILTER_SANITIZE_SPECIAL_CHARS
);
$filteredPostArray = filter_input_array(INPUT_POST, $post_array_to_filter);

if(isset($filteredPostArray["submit"]) ){
	$query = "INSERT INTO huisdieren (klant_id, soort, ras, naam, gebdatum) 
	VALUES ('".$filteredPostArray["klanten"]."','".$filteredPostArray["soort"]."','".$filteredPostArray["ras"]."','".$filteredPostArray["naam"]."','".$filteredPostArray["gebdatum"]."')";
	$insert = $database->prepare($query);
	try {
		$insert->execute(array());
		echo "<script>alert('Huisdier toegevoegd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Huisdier NIET toegevoegd.');</script>";
	}
	//}
}
?>
</body>
</html>