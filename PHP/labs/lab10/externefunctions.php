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
	
	function bestelRules($genre, $aantal) {
		$rules = array(
		"Klassiek" => array("min" => 3, "max" => 7),
		"Latin" => array("min" => 1, "max" => 5),
		"World" => array("min" => 2, "max" => 5),
		"Rock" => array("min" => 3, "max" => 7),
		"R&B" => array("min" => 4, "max" => 7),
		"Pop" => array("min" => 5, "max" => 7),
		);
		$aantal = $_POST["aantal"][0];

		if(array_key_exists($genre, $rules)) {
			$min = $rules[$genre]["min"];
			$max = $rules[$genre]["max"];
			if($aantal >= $min && $aantal <= $max) {
				return true;
			}
			return false;
		}
	}
?>
	</body>
</html>