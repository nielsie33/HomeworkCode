<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Cookies</title>
	</head>
	<body>
		<form name="login"
		action=""
		method="POST">
			Gebruikersnaam:<br>
			<input type="text" name="user" /><br><br>
			<input type="submit" name="submit" value="inloggen" />
		</form>
		<?php
		if(isset($_POST["submit"])) {
			welkom($_POST["submit"]);
		}
		
		function welkom($gebruiker) {
				$expire = time()+60*60*24*30;
				setcookie("user", $_POST['user'], $expire, '/');
				$gebruiker = $_POST["user"];
				if($gebruiker == 'Niels') {
					echo "Hallo $gebruiker welkom terug!";
				} 
				else {
					echo "Hallo $gebruiker u bent onze nieuwste gebruiker.";
				}
		}
		?>
	</body>
</html>