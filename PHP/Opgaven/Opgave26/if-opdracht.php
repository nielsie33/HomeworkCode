<?php
	$gewerkteuren = 50;
	$uurtarief = 15.00;
	$bonus = 100.00;
	$bruto = $gewerkteuren * $uurtarief;
	$bruto2 = $gewerkteuren * $uurtarief + $bonus;
	$belasting = ($gewerkteuren <= 40 ? "Belasting is 40%" : "Belasting is 45%");
	if($gewerkteuren <= 40) {
		echo "Uw basissalaris is: €".$bruto;
		echo "<br>Uw belasting is: €". 0.40*$bruto;
	}
	elseif($gewerkteuren >= 40) {
		echo "Uw basissalaris met bonus is: €".$bruto2;
		echo "<br>Uw belasting is: €". 0.45*$bruto2;
	}
	echo "<br>$belasting";
?>