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
			<select name="kleur">
			<option value="1">Zwart</option>
			<option value="2">Rood</option>
			<option value="3">Blauw</option>
			<option value="4">Groen</option>
			<option value="5">Oranje</option>
			<option value="6">Grijs</option>
			</select>
			<input type="submit" width="300px" name="submit"
			value="Klik" />
		</form>
		<?php
		session_start();
		// OPDRACHT 7
			function kleurenselect($kleur) {
				$kleuren = array();
				$kleuren[1] = "black";
				$kleuren[2] = "red";
				$kleuren[3] = "blue";
				$kleuren[4] = "green";
				$kleuren[5] = "orange";
				$kleuren[6] = "grey";
				return($kleuren[$kleur]);
			}
			if(isset($_POST["submit"])){
				if(isset($_POST["aantal"][0]))
				$aantal = htmlspecialchars($_POST["aantal"][0]);
				if($aantal > 16) {
					echo "<br><br><br>OPDRACHT 1";
					echo "<br>Het maximale aantal moet 16 zijn.";
					EXIT;
				} else {
				echo '<div style="color:'.kleurenselect($_POST["kleur"]).'">';
				echo "<br><br><br>OPDRACHT 1 (EN 7)";
				echo "<br>Aantal is: $aantal";
				}
				
				if(!($_SESSION['submit'])){
						$_SESSION['submit'] = 1;
					} else{
						$keren = $_SESSION['submit'] + 1;
						$_SESSION['submit'] = $keren;
					}
				echo "<br><br><br>OPDRACHT 6";
				echo "<br>Aantal keren: " . $_SESSION['submit'];;
					
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
					echo "</div>";
				}
				
				echo "<br><br><br>OPDRACHT 5";
				$format = '%d - %m - %Y';
				setlocale(LC_TIME, "NLD_NLD");
				$ned = strftime($format);
				echo "<br>Datum: ".$ned;
			?>