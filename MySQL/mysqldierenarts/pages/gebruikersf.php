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
  <li><a href="../pages/gebruikersf.php" class="active">Gebruikers</a></li>
  <li><a href="../pages/afsprakenf.php">Afspraken</a></li>
  <li><a href="../pages/huisdierenf.php">Huisdieren</a></li>
  <li><a href="../pages/overzichtafspraken.php">Afspraken overzicht</a></li>
</ul>
<div class="form-style-6">
<h1>Gebruiker aanmaken</h1>
<form name="gebruikeraanmaken" action="" method="post">
<input type="text" name="klantnaam" placeholder="Naam" />
<input type="email" name="email" placeholder="Email" />
<input type="text" name="password" placeholder="Wachtwoord" />
<input type="submit" name="submit" value="Aanmaken" />
</form>
</div>
<?php
$post_array_to_filter = array(
    'submit' => FILTER_SANITIZE_SPECIAL_CHARS,
    'klantnaam' => FILTER_SANITIZE_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_SPECIAL_CHARS,
    'password' => FILTER_SANITIZE_SPECIAL_CHARS
);
$filteredPostArray = filter_input_array(INPUT_POST, $post_array_to_filter);

if(isset($filteredPostArray["submit"]) ){
	$query = "INSERT INTO klanten (klantnaam, email, wachtwoord) 
	VALUES ('".$filteredPostArray["klantnaam"]."','".$filteredPostArray["email"]."','".password_hash($filteredPostArray["password"], PASSWORD_BCRYPT)."')";
	$insert = $database->prepare($query);
	try {
		$insert->execute(array());
		echo "<script>alert('Klant toegevoegd.');</script>";
	}
	catch(PDOException $e) {
		echo "<script>alert('Klant NIET toegevoegd.');</script>";
	}
	//}
}
?>
</body>
</html>