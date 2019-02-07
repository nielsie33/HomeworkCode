<!DOCTYPE html>
	<html lang="nl">
		<head>
		  <meta http-equiv="Content-Type"
		    content="text/html;
			charset=UTF-8" />
		</head>
		<body>
		<?php
		$brief="
		Beste <b><<abonnee>></b><br>
		U heeft het laatste nummer van ons magazine ontvangen.<br>
		Omdat we u heel graag als abonne willen behouden, bieden we u een aantrekkelijke
		en exclusieve korting: <br>U betaalt <b><<korting>></b> in plaats van 65 
		euro.<br><br>
		<i>Profiteer nu van deze aanbieding!</i><br><br>
		Met vriendelijke groet,<br>
		Sam Simons<br>
		Hoofdredacteur<br>";
		$zoek  = array('<<abonnee>>', '<<korting>>');
		$replace = array('Jan Davids', '50');
		echo str_replace($zoek, $replace, $brief);
		?>
	</body>
</html>