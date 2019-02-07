<?php
$email = htmlspecialchars($_POST['email']);
$wachtwoord = htmlspecialchars($_POST['password']);

$bestand=fopen("gebruikers.txt", "r");
if(!$bestand) {
	echo "Kon geen bestand openen!";
}

while(!feof($bestand)) {
	$account = fgets($bestand);
	$account = explode("*", $account);
	$naam = $account[0];
	$fotoNaam = $account[3];
	if($account[1] == $email && $account[2] == $wachtwoord) {
		session_start();
		$_SESSION["USER"] = $email;
		$_SESSION["NAAM"] = $naam;
		$_SESSION["FOTO"] = $fotoNaam;
		$_SESSION["STATUS"] = 1;
		$_SESSION["ID"] = $_COOKIE["PHPSESSID"];
		echo "
		<script>
		alert('U bent ingelogd als $email.');
		location.href='welkom.php';
		</script>
		";
	}
}

echo "
<script>
alert('Wachtwoord of gebruikersnaam ongeldig.');
location.href='inloggen.html';
</script>
";

?>