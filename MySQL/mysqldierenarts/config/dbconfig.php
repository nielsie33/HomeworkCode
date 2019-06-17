<?php
	$dbhost = "localhost";
	$dbname = "dierenarts";
	$user = "root";
	$pass = "root";
	try {
		$database = new
		PDO("mysql:host=$dbhost;dbname=$dbname", $user, $pass);
		$database->setAttribute
		(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "Verbinding gemaakt";
	}
	catch(PDOException $e) {
		echo $e->getMessage();
		echo "<br />Verbinding NIET gemaakt";
	}
?>