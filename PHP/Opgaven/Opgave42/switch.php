<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta http-equiv="Content-Type"
		content="text/html;
		charset=UTF-8" />
		<title>Switch opdracht</title>
	</head>
	<body>
	<form name="order"
	action=""
	method="POST">
		<p>Selecteer een land:</p>
		<select name="land" value="true">
			<option value=" "></option>
			<option value="nl">Nederland</option>
			<option value="be">België</option>
			<option value="de">Duitsland</option>
			<option value="es">Spanje</option>
		</select>
		<input type="submit" name="submit"
		value="Versturen">
		<br><br><br><br><br><br><br><br>
		<p>----------------------------------------------</p>
		</form>
		<?php
		if(isset($_POST["submit"])) {
			switch($_POST['land']) {
				case "nl" :
					echo "<p>U heeft Nederland gekozen</p>";
					break;
				case "be" :
					echo "<p>U heeft België gekozen</p>";
					break;
				case "de" :
					echo "<p>U heeft Duitsland gekozen</p>";
					break;
				case "es" :
					echo "<p>U heeft Spanje gekozen</p>";
					break;
				default:
					echo "<p>U heeft geen land gekozen</p>";
			}
		}
		?>
	</body>
</html>