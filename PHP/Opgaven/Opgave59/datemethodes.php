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

// add DateInterval
$date = new DateTime("2000-01-01");
$date->add(new DateInterval("P10D"));
echo "<br>Tien dagen toevoegen: " .$date->format("Y-m-d");

// substract DateInterval
$date->sub(new DateInterval("P10D"));
echo "<br>Tien dagen weghalen: " .$date->format("Y-m-d");

// date_diff
$factuurdatum = date_create("2018-10-10");
echo "<br>Factuurdatum: ".date_format($factuurdatum, "Y-m-d");
$vandaag = date_create("now");
echo "<br>Vandaag: ".date_format($vandaag, "Y-m-d");
$interval = date_diff($vandaag, $factuurdatum);
echo "<br>U heeft nog: ".$interval->format("%R%a dagen om te betalen");

?>

