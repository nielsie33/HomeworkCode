<html>
<head>
	<style>
	body,input,button{
		font-size: 1.0rem;
	}
	</style>
</head>
<body>
<?php
	echo $melding;
?>
<form action="" method="POST">
	<input name="naam" type="text" required="required"
	placeholder="Gebruikersnaam" /><br>
	<input name="wachtwoord" type="password" required="required"
	placeholder="Wachtwoord" /><br>
	<button type="submit" name="submit">Inloggen</button><br>
	<button type="reset">Reset</button>
</form>
</body>
</html>