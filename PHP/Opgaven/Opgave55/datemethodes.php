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

?>

