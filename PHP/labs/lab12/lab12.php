<!DOCTYPE html>
<html lang="nl">
<head>
	<meta http-equiv="Content-Type"
	content="text/html";
	charset="UTF-8" />
	<title>Lab 12</title>
	</head>
	<body>
	<h3>Lab 12</h3>
	<?PHP
		echo "<br>Reken het saldo uit zolang saldo lager dan 2000 is";
		$saldo = 100;
		$rente = 0.21;
		$maand = 1;
		echo "<br>Beginsaldo is: $saldo";
		echo "<br>START... ";
		do {
			$saldo = $saldo + ($saldo * $rente);
			$saldo = sprintf("%0.2f", $saldo);
			if($maand == 2) {
				echo "<br>Februari telt niet mee";
				$maand++;
				continue;
			}
			if($saldo > 2000) {
				echo "<br>Maximale saldo 2000 is bereikt";
				$maand++;
				break;
			}
			if($maand == 6 && $saldo < 1000) {
				echo "<br>Je saldo is te laag";
				$maand++;
				exit;
			}
			echo "<br>Maand: $maand je saldo is: $saldo";
			$maand++;
		}
		while($saldo < 2000);
		echo "<br>FINISH";
	?>
	</body>
</html>