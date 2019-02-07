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
			<input required type="text"
			name="naam" placeholder="Naam"  /><br>
			<input required type="text"
			name="adres" placeholder="Adres"  /><br>
			<input required type="text"
			name="plaats" placeholder="Plaats"  /><br>
			<input required type="text"
			name="postcode" placeholder="Postcode"  /><br>
			<input required type="email"
			name="email" placeholder="E-mailadres"  /><br><br>
			<textarea name="commentaar"
			placeholder="Typ je commentaar in ..."
			rows=4></textarea><br>
			<input type="submit"
			name="submit" value="Submit"  />
		</form>
		<?php
			if(isset($_POST["submit"])){
				$naam = htmlspecialchars($_POST["naam"]);
				$adres = htmlspecialchars($_POST["adres"]);
				$plaats = htmlspecialchars($_POST["plaats"]);
				$postcode = htmlspecialchars($_POST["postcode"]);
				$email = htmlspecialchars($_POST["email"]);
				$commentaar = htmlspecialchars($_POST["commentaar"]);
				
				$naam = trim($naam);
				$adres = trim($adres);
				$plaats = trim($plaats);
				$postcode = trim($postcode);
				$email = trim($email);
				$commentaar = trim($commentaar);
				
				$plaats = strtoupper($plaats);
				if($plaats == "AMSTERDAM")
				{
					$bezorgkosten = 10.00;
				}
				elseif($plaats == "UTRECHT")
				{
					$bezorgkosten = 20.00;
				}
				else
				{
					$bezorgkosten = 30.00;
				}
				echo "<br>Bezorgkosten: $bezorgkosten";
				
				$email = strtolower($email);
				echo "<br>E-mailadres: $email";
			}	
		?>
	</body>
</html>