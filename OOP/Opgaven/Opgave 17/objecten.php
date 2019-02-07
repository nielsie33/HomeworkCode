<html>
<head>
	<?php include("klassen.php"); ?>
	<title>OO PHP</title>
</head>
<body>
<?php
	$umut = new Persoon("Umut",18,"man");
	$demirel = new Persoon("Demirel",23,"man");
	$niels = new Persoon("Niels",17,"man");
	$thamara = new Persoon("Thamara",18,"vrouw");
	unset($umut);
	$demirel->setLeeftijd(24);
	echo "<br>De leeftijd van Demirel is: " .
	$demirel->getLeeftijd();
	$thamara->setNaam(12343);
	$thamara->setLeeftijd(19);
	echo "<br>De leeftijd van Thamara is: " .
	$thamara->getLeeftijd();
	$thamara->printGegevens();
	$demirel->printGegevens();
?>
</body>
</html>