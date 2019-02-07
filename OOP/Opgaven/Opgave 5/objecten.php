<html>
<head>
	<?php include("klassen.php"); ?>
	<title>OO PHP</title>
</head>
<body>
<?php
	$umut = new Persoon("Umut",18,"man");
	$demirel = new Persoon("Demirel",23,"man");
?>
<?php
	unset($umut);
?>
</body>
</html>