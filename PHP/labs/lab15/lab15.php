<?php
$format = '%d %B %Y';
setlocale(LC_TIME, "NLD_NLD");
$ned = strftime($format);
echo "<br>Vandaag is: ".$ned;
$kerstdatum = date_create("2018-12-25");
$vandaag = date_create("now");
$verschil = date_diff($vandaag, $kerstdatum);
echo "<br>U heeft nog: ".$verschil->format("%R%a dagen tot kerst");
?>

