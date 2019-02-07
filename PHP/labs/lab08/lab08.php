<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta http-equiv="Content-Type"
		content="text/html;
		charset=UTF-8" />
		<title>Lab 08</title>
	</head>
	<body>
	<!--Shoppingcart begint hier-->
	<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<form name="order"
		action=""
		method="POST">
			<tr>
			  <td>
			  <img src="images/evora.jpg" width="100px" alt="X" />
			  </td>
			</tr>
		<tr>
		<td>
		Cesaria Evora "Em Um Concerto" Tracks: 10 Prijs: 9.99
		</td>
		</tr>
		  <tr>
		    <td>
			<input type="hidden" name="albumcode[0]"
			value="001" />
			<input type="hidden" name="artiest[0]"
			value="Cesaria Evora " />
			<input type="hidden" name="titel[0]"
			value="Em Um Concerto" />
			<input type="hidden" name="tracks[0]"
			value="10">
			<input type="hidden" name="prijs[0]"
			value="9.99" />
			<input type="hidden" name="genre[0]"
			value="World" />
			
			Aantal: <input type="text" size=2 maxlength=3
			name="aantal[0]" value="0"
			style="background-color:#f8ce6c" />
			<hr />
			</td>
		</tr>
		
		<tr>
			<td>Korting:<br />
			<input type="checkbox" name="student"
			value="15" />Student 15%<br />
			<input type="checkbox" name="senior"
			value="10" />Senior 10%<br />
			  <input type="checkbox" name="klant"
			  value="5" />Klant 5%<br />
			  </td>
		</tr>
		<tr>
		<td>
		<p>Selecteer een betalingswijze:</p>
		<select name="betaling" value="true">
			<option value=" "></option>
			<option value="visa">Visa</option>
			<option value="mastercard">Mastercard</option>
			<option value="paypal">PayPal</option>
			<option value="ideal">Ideal</option>
		</select>
		<input type="submit" width="300px" name="submit"
		value="	Bestellen		" />
		<hr />
		</td>
		</tr>
		</form>
		</table>
		<?php
			if(isset($_POST["submit"])){
				if(isset($_POST["aantal"][0]))
					$aantal = htmlspecialchars($_POST["aantal"][0]);
				$korting = 0;
				if(isset($_POST["student"]))
					$korting = $korting + 15;
				if(isset($_POST["senior"]))
					$korting = $korting + 10;
				if(isset($_POST["klant"]))
					$korting = $korting + 5;;
				echo "<br>Aantal is: $aantal";
				echo "<br>Korting is: $korting" . " procent";
							
				switch($_POST['betaling']) {
				case "visa" :
					echo "<br>Betalingswijze: Visa";
					break;
				case "mastercard" :
					echo "<br>Betalingswijze: Mastercard";
					break;
				case "paypal" :
					echo "<br>Betalingswijze: PayPal";
					break;
				case "ideal" :
					echo "<br>Betalingswijze: Ideal";
					break;
				default:
					echo "<br>Betalingswijze: U heeft geen betalingswijze gekozen";
				}
			}
		?>
		<!--Shoppingcart eindigt hier-->
	</body>
</html>