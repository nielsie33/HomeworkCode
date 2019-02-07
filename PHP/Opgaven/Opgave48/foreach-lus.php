<!DOCTYPE html>
<html lang="nl">
<head>
	<meta http-equiv="Content-Type"
	content="text/html";
	charset="UTF-8" />
	<title>foreach-lus</title>
	</head>
	<body>
	<h3>Voorbeeld van de foreach-lus</h3>
	<?PHP
		$kleuren["oranje"] = "orange";
		$kleuren["rood"] = "red";
		$kleuren["paars"] = "violet";
		$kleuren["groen"] = "green";
		$kleuren["blauw"] = "blue";
		$kleuren["geel"] = "yellow";
		foreach($kleuren as $kleur) {
			echo "<br><font color=$kleur>Deze tekst is in $kleur";
		}
	?>
	</body>
</html>