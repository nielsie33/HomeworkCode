<!DOCTYPE html>
	<html lang="nl">
		<head>
		  <meta http-equiv="Content-Type"
		    content="text/html;
			charset=UTF-8" />
		</head>
		<body>
		  <form action="lab05verwerken.php" method="post">
		  <fieldset style="width:500px">
		  <h1><legend>Inschrijfformulier:</legend></h1>
			Achternaam:<input type="text" name="achternaam"><br>
			Voornaam:<input type="text" name="voornaam"><br>
			Adres:<input type="text" name="adres"><br>
			Postcode:<input type="text" name="postcode"><br>
			Plaats:
			<select name="woonplaats">
				<option value="selecteren">Selecteer uw plaats</option>
				<option value="Terneuzen">Terneuzen</option>
				<option value="Axel">Axel</option>
				<option value="Sluiskil">Sluiskil</option>
			</select><br>
			E-mailadres:<input type="email" name="emailadres"><br>
			<br><br>
			</fieldset>
			<input type="hidden" name="opleiding" value="false">
			<br>Kies een opleiding:<br>
			<input type="radio" name="opleiding" value="ICT"> ICT <br>
			<input type="radio" name="opleiding" value="Engels"> Engels <br>
			<input type="radio" name="opleiding" value="Techniek"> Techniek <br>
			<input type="radio" name="opleiding" value="Nederlands"> Nederlands <br>
			<br>
			<input type="submit" name="submit" value="Versturen">
			<input type="reset" name="reset" value="reset">
		</form>
	</body>
</html>