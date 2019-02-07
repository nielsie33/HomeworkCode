<?php
session_start();
$mijnSession = session_id();
if(isset($_SESSION['ID']) && $_SESSION['ID'] === $mijnSession) {
	echo "<h3>Welkom</h3>";
	echo "Welkom: " . $_SESSION['USER'] . "!<br><br>";
	echo "<a href='blogs.html'><input type='button' name='blog' value='Klik hier om een blog te schrijven.' /></a><br>";
} else {
	echo "<br>Je moet eerst inloggen!<br>";
}
?>
<a href='uitloggen.php'><input type='button' name='terug' value='Uitloggen' /></a>