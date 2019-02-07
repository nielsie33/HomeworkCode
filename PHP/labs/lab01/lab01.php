<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8">
		<title>lab 01</title>
	</head>
	<body>
		<?php
			$breedte = 10;
			$lengte = 11;
			$hoogte = 5;
			
			$oppervlakte = $breedte * $lengte;
			$volume = $lengte * $breedte * $hoogte;
			
			echo "Containeroppervlakte is: $oppervlakte<br/>";
			echo "Containervolume is: $volume";
		?>
	</body>
</html>