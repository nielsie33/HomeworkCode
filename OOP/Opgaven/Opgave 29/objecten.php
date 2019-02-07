<html>
<head>
	<?php include("klassen.php"); ?>
	<title>OO PHP</title>
</head>
<body>
<?php
	$umut = new Persoon("Umut",18,"man");
	$demirel = new Persoon("Demirel",23,"man");
	$niels = new Persoon("Niels",17,"man");
	$thamara = new Persoon("Thamara",18,"vrouw");
	unset($umut);
	$demirel->setLeeftijd(24);
	echo "<br>De leeftijd van Demirel is: " .
	$demirel->getLeeftijd();
	$thamara->setNaam(12343);
	$thamara->setLeeftijd(19);
	echo "<br>De leeftijd van Thamara is: " .
	$thamara->getLeeftijd();
	$thamara->printGegevens();
	$demirel->printGegevens();
	$user1 = new User("Shireen ",22,"vrouw", "Shireen@gmail.com","Uh65Tg",true);
	echo "<br>Naam van user1 is: " . $user1->getNaam();
	$user1->printGegevens();
	
	$item1 = new Item("001", "Toshiba", "Satelite", 999.99, 10);
	$item2 = new Item("002", "Acer", "Aspire", 1099.99, 5);
	
	$myShoppingcart = new MyShoppingcart();
	$myShoppingcart->addToCart($item1);
	$myShoppingcart->addToCart($item2);
	$myShoppingcart->printCart();
	
	try{
		$item1->setAantal("drie");
	}
	catch (Exception $e){
		die( $e->__toString());
	}
?>
</body>
</html>