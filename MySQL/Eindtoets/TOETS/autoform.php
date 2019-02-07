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
  <li><a href="autoform.php" class="active">Auto formulier</a></li>
  <li><a href="klantform.php">Klanten formulier</a></li>
  <li><a href="autoschema.php">Auto Schema</a></li>
  <li><a href="klantschema.php">Klant Schema</a></li>
    <li><a href="verkochtschema.php">Verkocht Schema</a></li>
	<li><a href="alfabetisch.php">Alfabetisch Schema</a></li>
	<li><a href="namenschema.php">Namen Schema</a></li>
	<li><a href="getallenschema.php">Getallen Schema</a></li>
</ul>
<div class="form-style-6">
<h1>Auto aanmaken</h1>
<form name="autoindienen" action="" method="post">
<input type="text" name="merk" placeholder="Merk" />
<input type="text" name="model" placeholder="Model" />
<input type="number" name="bouwjaar" placeholder="Bouwjaar" />
<input type="text" name="kleur" placeholder="Kleur" />
<input type="text" name="inkoopprijs" placeholder="Prijs" />
<input type="text" name="klant" placeholder="Klantennummer" />
<input name="submit" type="submit" value="Verzenden" />
</form>
</div>
<?php
if(isset($_POST["submit"]) ){
	/*if(empty($_POST["naam"]) ){
		echo "<script>alert('Naam NIET ingevuld.');</script>";
	}
	elseif(empty($_POST["email"]) ){
		echo "<script>alert('Email NIET ingevuld.');</script>";
	}
	elseif(empty($_POST["geboortedatum"]) ){
		echo "<script>alert('Geboortedatum NIET ingevuld.');</script>";
	}
	elseif(!in_array($_POST["postcode"], array("1098 LV", "1098 LX", "1098 XX", "1099 TT", "1999 BB", "2000 AA"))) {
		echo "<script>alert('Postcode NIET ingevuld.');</script>";
	}
	elseif(!in_array($_POST["klachtsoort"], array("1", "2", "3"))) {
		echo "<script>alert('Klachtsoort NIET ingevuld.');</script>";
	}
	elseif(empty($_POST["geslacht"]) ){
		echo "<script>alert('Geslacht NIET ingevuld.');</script>";
	}
	else{*/
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
	
	$query = "INSERT INTO car_data (merk, model, bouwjaar, kleur, inkoopprijs, fk_id_klant) 
	VALUES ('".$_POST["merk"]."','".$_POST["model"]."','".$_POST["bouwjaar"]."','".$_POST["kleur"]."','".$_POST["inkoopprijs"]."','".$_POST["klant"]."')";
	$insert = $database->prepare($query);
	try {
		$insert->execute(array());
		echo "<script>alert('Auto toegevoegd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Auto NIET toegevoegd.');</script>";
	}
	//}
}
?>
</body>
</html>