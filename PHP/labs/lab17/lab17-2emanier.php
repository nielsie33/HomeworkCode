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
			<input type="text" name="voornaam" placeholder="Voornaam"><br>
			<input type="text" name="achternaam" placeholder="Achternaam"><br>
			<input type="text" name="geboortedatum" placeholder="Geboortedatum"><br>
			<input type="text" name="adres" placeholder="Adres"><br>
			<input type="text" name="postcode" placeholder="Postcode"><br>
			<input type="text" name="plaats" placeholder="Plaats"><br>
			<input type="email" name="email" placeholder="E-mailadres"><br>
			<input type="password" name="password" placeholder="Wachtwoord"><br>
				
			<b><label for="minderjarigheid">Minderjarig: </label>
			Ja <input type="radio" name="minderjarig" value="Ja">
			Nee <input type="radio" name="minderjarig" value="Nee">
			<br></b>
		<input type="submit" name="submit" value="Aanmelden">
		<input type="reset" name="reset" value="Annuleren">
		</fieldset>
		</form>
		
		<?php
			if(isset($_POST["submit"])) {
				$gebruiker = array(
					"voornaam" => $_POST["voornaam"],
					"achternaam" => $_POST["achternaam"],
					"geboortedatum" => $_POST["geboortedatum"],
					"adres" => $_POST["adres"],
					"postcode" => $_POST["postcode"],
					"plaats" => $_POST["plaats"],
					"email" => $_POST["email"],
					"password" => $_POST["password"],
					"minderjarig" => $_POST["minderjarig"]
				);
				echo "<br><br>";
				print_r($gebruiker);
				$jsonstring = json_encode($gebruiker);
				echo "<br><br>".$jsonstring;
			}
		
		?>
    </body>
</html>