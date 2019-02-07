<!DOCTYPE html>
<html lang="nl">
    <head>
		<meta http-equiv="Content-Type"
		    content="text/html;
			charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Lab 17</title>
    </head>
    <body>
        <form name="formulier"
			action=""
			method="POST">
		<fieldset>
			<input type="text" name="informatie[0][voornaam]" placeholder="Voornaam"><br>
			<input type="text" name="informatie[0][achternaam]" placeholder="Achternaam"><br>
			<input type="text" name="informatie[0][geboortedatum]" placeholder="Geboortedatum"><br>
			<input type="text" name="informatie[0][adres]" placeholder="Adres"><br>
			<input type="text" name="informatie[0][postcode]" placeholder="Postcode"><br>
			<input type="text" name="informatie[0][plaats]" placeholder="Plaats"><br>
			<input type="email" name="informatie[0][email]" placeholder="E-mailadres"><br>
			<input type="password" name="informatie[0][password]" placeholder="Wachtwoord"><br>
				
			<b><label for="minderjarigheid">Minderjarig: </label>
			Ja <input type="radio" name="informatie[0][minderjarig]" value="Ja">
			Nee <input type="radio" name="informatie[0][minderjarig]" value="Nee">
			<br></b>
		<input type="submit" name="submit" value="Aanmelden">
		<input type="reset" name="reset" value="Annuleren">
		</fieldset>
		</form>
		
		<?php
			if(isset($_POST["submit"])) {
				$gebruiker = $_POST["informatie"][0];
				echo "<br><br>";
				print_r($gebruiker);
				$jsonstring = json_encode($gebruiker);
				echo "<br><br>".$jsonstring;
			}
		
		?>
    </body>
</html>