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
	$query2 = "SELECT * FROM huisdieren;";
	$huisdieren = $database->prepare($query2);
	try {
		$huisdieren->execute(array());
		$huisdieren->setFetchMode(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
		echo "<script>alert('Geen huisdieren gevonden.');</script>";
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
  <li><a href="../pages/afsprakenf.php" class="active">Afspraken</a></li>
  <li><a href="../pages/huisdierenf.php">Huisdieren</a></li>
  <li><a href="../pages/overzichtafspraken.php">Afspraken overzicht</a></li>
</ul>
<div class="form-style-6">
<h1>Afspraak aanmaken</h1>
<form name="afspraakaanmaken" action="" method="post">
<input type="date" name="datum" />
<input type="text" name="tijd" placeholder="Tijd" />
<select name="klanten">
<?php foreach($klant as $cl) { ?>
	<option value="<?= $cl['id']; ?>"><?= $cl['klantnaam']; ?></option>
<?php } ?>
</select>
<select name="huisdieren">
<?php foreach($huisdieren as $dier) { ?>
	<option value="<?= $dier['id']; ?>"><?= $dier['naam']; ?></option>
<?php } ?>
</select>
<input type="submit" name="submit" value="Aanmaken" />
</form>
</div>
<?php
$post_array_to_filter = array(
    'submit' => FILTER_SANITIZE_SPECIAL_CHARS,
    'datum' => FILTER_SANITIZE_SPECIAL_CHARS,
    'tijd' => FILTER_SANITIZE_SPECIAL_CHARS,
    'klanten' => FILTER_SANITIZE_SPECIAL_CHARS,
    'huisdieren' => FILTER_SANITIZE_SPECIAL_CHARS
);
$filteredPostArray = filter_input_array(INPUT_POST, $post_array_to_filter);

if(isset($filteredPostArray["submit"]) ){
	$query = "INSERT INTO afspraken (datum, tijd, klant_id, huisdier_id) 
	VALUES ('".$filteredPostArray["datum"]."','".$filteredPostArray["tijd"]."','".$filteredPostArray["klanten"]."','".$filteredPostArray["huisdieren"]."')";
	$insert = $database->prepare($query);
	try {
		$insert->execute(array());
		echo "<script>alert('Afspraak toegevoegd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Afspraak NIET toegevoegd.');</script>";
	}
	//}
}
?>
</body>
</html>