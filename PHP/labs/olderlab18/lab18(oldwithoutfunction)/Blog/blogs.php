<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="blogcss.css">
	<style>
	<?php include 'blogcss.css'; ?>
	</style>
</head>
<body>
	<div id="wrapperHeader">
	 <div id="header">
	 </div> 
	</div>
	<center><h1> Blogs </h1></center>
<center><a href="blogs.html"><input type="button" name="terug" value="Terug naar vorige pagina"></a></center>
<?php
session_start();
$mijnSession = session_id();
if(isset($_SESSION['ID']) && $_SESSION['ID'] === $mijnSession) {
	if(isset($_POST['submit'])) {
		$bestand=fopen("blogs.txt", "a");
		if(!$bestand) {
			echo "Kon geen bestand openen!";
		}

		$tag = "<br><span class='kleur'>" . "@" . $_SESSION["NAAM"];
		$bericht = htmlspecialchars($_POST['text']);
		setlocale(LC_TIME, 'nld_NLD');
		$format = '%A %d %B %Y %H:%M:%S';
		$geformatteerde_datum = strftime($format);
		
		$verstuurder =
		$tag . "\r\n</span>" . 
		$bericht . "\r\n" .
		$geformatteerde_datum . "\r\n" . "---------------------------------------------------------------\n";
			
		fwrite($bestand,$verstuurder,strlen($verstuurder));
		
		if(fclose($bestand)) {
			echo "<br><center>Blog is opgeslagen en verzonden</center><br>";
		} else {
			echo "Kon bestand niet afsluiten";
		}
	}
	$bestand = "blogs.txt";
	$a = fopen($bestand, "r");
	echo "<div class='list-type2'><center><ul>";
	while(!feof($a))
	{
	  echo fgets($a)."<br>";
	  }
	echo "</ul></div></center>";
	fclose($a);
}
?>
