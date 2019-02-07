<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta http-equiv="Content-Type"
		content="text/html;
		charset=UTF-8" />
	</head>
	<body>
<?php
	function servicekosten($betalingswijze) {
		switch($_POST['betaling']) {
			case "visa" :
				$betalingswijze = 10;
				break;
			case "mastercard" :
				$betalingswijze = 12	;
				break;
			case "paypal" :
				$betalingswijze = 14;
				break;
			case "ideal" :
				$betalingswijze = 16;
				break;
			default:
				$betalingswijze = 0;
		}
		return($betalingswijze);
	}
	
	function bestelRules($genre, $genre1, $aantal, $aantal1) {
		$rules = array(
		"Klassiek" => array("min" => 3, "max" => 7),
		"Latin" => array("min" => 1, "max" => 5),
		"World" => array("min" => 2, "max" => 5),
		"Rock" => array("min" => 3, "max" => 7),
		"R&B" => array("min" => 4, "max" => 7),
		"Pop" => array("min" => 5, "max" => 7),
		);
		$aantal = $_POST["aantal"][0];
		$aantal1 = $_POST["aantal"][1];

		if(array_key_exists($genre, $rules)) {
			$min = $rules[$genre]["min"];
			$max = $rules[$genre]["max"];
			$min1 = $rules[$genre1]["min"];
			$max1 = $rules[$genre1]["max"];
			if($aantal >= $min && $aantal <= $max && $aantal1 >= $min1 && $aantal1 <= $max1) {
				return true;
			}
			return false;
		}
	}
	
	function overzicht() {
		for($x = 0; $x < sizeof($_POST["albumcode"][0]); $x++) {
			$aantal = doubleval($_POST["aantal"][0]);
			$aantal1 = doubleval($_POST["aantal"][1]);
			$genre = $_POST["genre"][0];
			$genre1 = $_POST["genre"][1];
			$artiest = $_POST["artiest"][0];
			$artiest1 = $_POST["artiest"][1];
			$titel = $_POST["titel"][0];
			$titel1 = $_POST["titel"][1];
			$prijs = $_POST["prijs"][0];
			$prijs1 = $_POST["prijs"][1];
			$bedrag = $aantal * $prijs;
			$bedrag1 = $aantal1 * $prijs1;
			$totaal = $bedrag + $bedrag1;
			$korting = 0;
				if(isset($_POST["student"]))
					$korting = $korting + 15;
				if(isset($_POST["senior"]))
					$korting = $korting + 10;
				if(isset($_POST["klant"]))
					$korting = $korting + 5;
			$betalingswijze = 0;
			$servicekosten = servicekosten($betalingswijze);
			$tebetalen = $totaal + $servicekosten - $korting;
			echo "<table border='1'>
			<br><h3>Overzicht</h3>	
			<thead style='background-color:#f8ce6c;'>
				<tr><th>Genre</th><th>Artiest</th><th>Titel
				</th><th>Aantal</th><th>Prijs</th><th>Bedrag
				</th></tr>
			</thead>
			<tbody>
				<tr>
				<td>$genre</td>
				<td>$artiest</td>
				<td>$titel</td>
				<td>$aantal</td>
				<td>$prijs</td>
				<td>$bedrag</td>
				</tr>
			</tbody>
			<tbody>
				<tr>
				<td>$genre1</td>
				<td>$artiest1</td>
				<td>$titel1</td>
				<td>$aantal1</td>
				<td>$prijs1</td>
				<td>$bedrag1</td>
				</tr>
			</tbody>
			
			<tfoot>
				<tr><td colspan='5'>Te betalen</td>
				<td>$tebetalen</td></tr>
			</tfoot>
			<tfoot>
				<tr><td colspan='5'>Totaal</td>
				<td>$totaal</td></tr>
			</tfoot>
			<tfoot>
				<tr><td colspan='5'>Korting</td>
				<td>$korting</td></tr>
			</tfoot>
			<tfoot>
				<tr><td colspan='5'>Servicekosten</td>
				<td>$servicekosten</td></tr>
			</tfoot>
			</table>";
		}
	}
?>
	</body>
</html>