<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta http-equiv="Content-Type"
		content="text/html;
		charset=UTF-8" />
	</head>
	<body>
		<form name="form"
		action=""
		method="POST">
			Aantal: <input type="text" size=2 maxlength=2
			name="aantal[0]" value="1"
			style="background-color:#f8ce6c" />
			<hr />
			<input type="submit" width="300px" name="submit"
			value="Klik" />
		
		<?php
			if(isset($_POST["submit"])){
				if(isset($_POST["aantal"][0]))
				$aantal = htmlspecialchars($_POST["aantal"][0]);
				if($aantal > 16) {
					echo "<br><br><br>OPDRACHT 1";
					echo "<br>Het maximale aantal moet 16 zijn.";
					exit;
				} else {
				echo "<br><br><br>OPDRACHT 1";
				echo "<br>Aantal is: $aantal";
				}
			}
		?>