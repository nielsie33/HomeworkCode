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
  <li><a href="formulier.php" class="active">Klacht indienen</a></li>
  <li><a href="schema.php">Klachten Schema</a></li>
</ul>
<div class="form-style-6">
<h1>Indienen klacht: overlasten</h1>
<form name="klachtindienen" action="" method="post">
<input type="text" name="naam" placeholder="Naam" />
<input type="email" name="email" placeholder="Email" />
<input type="text" name="geboortedatum" placeholder="Geboortedatum YYYY-MM-DD" />
<select name="postcode">
<option value="NULL">Selecteer postcode</option>
<option value="1098 LV">1098 LV</option>
<option value="1098 LX">1098 LX</option>
<option value="1098 XX">1098 XX</option>
<option value="1099 TT">1099 TT</option>
<option value="1999 BB">1999 BB</option>
<option value="2000 AA">2000 AA</option>
</select>
<select name="klachtsoort">
<option value="NULL">Selecteer klachtsoort</option>
<option value="1">Milieu</option>
<option value="2">Veiligheid</option>
<option value="3">Geluid</option>
</select>
Geslacht:
<input type="radio" name="geslacht" value="M">Man
<input type="radio" name="geslacht" value="V">Vrouw<br><br>
<input name="submit" type="submit" value="Verzenden" />
</form>
</div>
<?php
if(isset($_POST["submit"]) ){
	if(empty($_POST["naam"]) ){
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
	else{
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
	
	$query = "INSERT INTO klacht (email, geboortedatum, postcode, naam, datum, ID_klachtsoort, geslacht) 
	VALUES ('".$_POST["email"]."','".$_POST["geboortedatum"]."','".$_POST["postcode"]."','".$_POST["naam"]."','".Date("Y-m-d-G-i-s")."','".$_POST["klachtsoort"]."','".$_POST["geslacht"]."')";
	$insert = $database->prepare($query);
	try {
		$insert->execute(array());
		echo "<script>alert('Klacht toegevoegd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Klacht NIET toegevoegd.');</script>";
	}
	}
}
?>
</body>
</html>