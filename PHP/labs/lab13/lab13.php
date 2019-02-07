<!DOCTYPE html>
<html lang="nl">
<head>
	<meta http-equiv="Content-Type"
	content="text/html";
	charset="UTF-8" />
	<title>lab13</title>
	</head>
	<body>
	<h3>Lab 13</h3>
	<?PHP
		$kleuren["oranje"] = "orange";
		$kleuren["rood"] = "red";
		$kleuren["paars"] = "violet";
		$kleuren["groen"] = "green";
		$kleuren["blauw"] = "blue";
		$kleuren["geel"] = "yellow";
		foreach($kleuren as &$kleur) {
			if($kleuren["geel"] == "$kleur") {
				$kleur = "black";
			}
			echo "<br><font color=$kleur>Deze tekst is in $kleur";
		}
	?>
	</body>
</html>