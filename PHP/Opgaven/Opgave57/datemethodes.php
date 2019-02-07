<?php
//Formatteren
$format = '%A %d %B %Y %H:%M:%S';
$geformatteerde_datum = strftime($format);
echo "<br>Geformatteerde datum: ".$geformatteerde_datum;

//locale datum instelling
setlocale(LC_TIME, "NLD_NLD");
$ned = strftime($format);
echo "<br>In het Nederlands: ".$ned;

$vandaag = new DateTime("now");
echo "<br>Vandaag timestamp: ".$vandaag->getTimestamp();

$eenDag = 86400;
$begin2000 = DateTime::createFromFormat("d/m/Y", "1/1/2000");
$eind2000 = DateTime::createFromFormat("d/m/Y", "31/12/2000");
$begin = $begin2000->getTimestamp();
$einde = $eind2000->getTimestamp();
$dagenIn2000 = ($einde - $begin)/ $eenDag;
echo "<br>Aantal dagen in 2000: " . $dagenIn2000;

// date_format verwerken
$datum = new DateTime("2000/01/01");
echo "<br>Datum formatteren: " . date_format($datum, "Y-m-d");
echo "<br>Datum formatteren: " . date_format($datum, "d-m-Y");

?>

