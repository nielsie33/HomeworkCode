<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta http-equiv="Content-Type"
		content="text/html;
		charset=UTF-8" />
	</head>
	<body>
		<form name="form"
		action=""
		method="POST">
			Aantal: <input type="text" size=2 maxlength=2
			name="aantal[0]" value="1"
			style="background-color:#f8ce6c" />
			<hr />
			Tekst input: <input type="text"
			name="text[0]" value=""
			style="background-color:#f8ce6c" />
			<hr />
			<input type="submit" width="300px" name="submit"
			value="Klik" />
		
		<?php
			if(isset($_POST["submit"])){
				if(isset($_POST["aantal"][0]))
				$aantal = htmlspecialchars($_POST["aantal"][0]);
				if($aantal > 16) {
					echo "<br><br><br>OPDRACHT 1";
					echo "<br>Het maximale aantal moet 16 zijn.";
					exit;
				} else {
				echo "<br><br><br>OPDRACHT 1";
				echo "<br>Aantal is: $aantal";
				}
					
				echo "<br><br><br>OPDRACHT 2";
					for($i=0; $i<=$_POST["aantal"][0]; $i++) {
						for($j=1;$j<=$i;$j++){
						if ($i % 2 == 0)
						  {
							echo "*";
						  }
						  else
						  {
							echo "-";
						  }
						}
						echo "<br />";
					}
					
					echo "<br><br><br>OPDRACHT 3";
					echo "<br>";
						do {
							for($i=$_POST["aantal"][0]; $i>=1; $i--) {
								for($j=1;$j<=$i;$j++){
								if ($i % 2 == 0)
								  {
									echo "*";
								  }
								  else
								  {
									echo "-";
								  }
								}
								echo "<br />";
							}
						}
						while($i != 0);
					
					echo "<br><br><br>OPDRACHT 4";
					if(isset($_POST["text"][0]))
					$text = htmlspecialchars($_POST["text"][0]);
					$array = explode(" ", $text);
					foreach($array as $value){
						echo "<br>".$value;
						echo strlen($value);
					}
					$string = str_replace(' ', '', $text);
					echo "<br>Totaal aantal characters: " . strlen($string);
				}
		?>