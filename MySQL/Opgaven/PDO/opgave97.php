<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type"
	content="text/html";
	charset="UTF-8">
</head>
<body>
<?php
	echo "<br />---- Opgave 96: Drivers: ";
	print_r(PDO::getAvailableDrivers());
	
	echo "<br />----Opgave 97: PDO verbinding maken.";
	$dbhost = "localhost";
	$dbname = "webshop";
	$user = "root";
	$pass = "";
	try {
		$database = new
		PDO("mysql:host=$dbhost;dbname=$dbname", $user, $pass);
		$database->setAttribute
		(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "<br />Verbinding gemaakt";
	}
	catch(PDOException $e) {
		echo $e->getMessage();
		echo "<br />Verbinding NIET gemaakt";
	}
?>
</body>
</html>