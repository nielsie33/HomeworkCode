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
	
function blogopslaan() {
	$bestand=fopen("blogs.txt", "a");
	if(!$bestand) {
		echo "Kon geen bestand openen!";
	}

	$tag = "<br><span class='kleur'>" . "@" . $_SESSION["NAAM"];
	$fotoNaam = $_SESSION["FOTO"];
	$profielFoto = '<img src="uploads/'.$fotoNaam.'" width="75" height="75"> ';
	$bericht = htmlspecialchars($_POST['text']);
	$bericht = trim($bericht);
	setlocale(LC_TIME, 'nld_NLD');
	$format = '%A %d %B %Y %H:%M:%S';
	$geformatteerde_datum = strftime($format);
	
	$verstuurder =
	$tag . "\r\n</span>" . 
	$profielFoto . "\r\n" . 
	$bericht . "\r\n" .
	$geformatteerde_datum . "\r\n" . "---------------------------------------------------------------\n";
		
	fwrite($bestand,$verstuurder,strlen($verstuurder));
	
	if(fclose($bestand)) {
		echo "<br><center>Blog is opgeslagen en verzonden</center><br>";
	} else {
		echo "Kon bestand niet afsluiten";
	}
}
	
function toonblogs() {
	$bestand=fopen("blogs.txt", "r");
	echo "<div class='list-type2'><center><ul>";
	while(!feof($bestand)) {
		$regel = fgets($bestand);
		echo $regel ."<br>";
	}
	echo "</ul></div></center>";
	fclose($bestand);
}
	
if(isset($_POST['submit'])) {
	blogopslaan();
}

toonblogs();
?>
