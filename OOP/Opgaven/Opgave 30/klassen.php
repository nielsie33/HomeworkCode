<?php
	interface Iitem{
		public function addToCart(Item $item);
		public function printCart();
		public function getId();
		public function getPrijs();
	}
	abstract class Item implements Iitem {
		protected $items = array();
		
		protected $id;
		protected $prijs;
		protected $aantal;
		
		public function getId(){
			return $this->id;
		}
		public function getPrijs(){
			return $this->prijs;
		}
		public function getAantal(){
			return $this->aantal;
		}
		
		public function addToCart($item){
			$this->items[] = $item;
			echo "<pre>";
			var_dump($item);
			echo "</pre>";
		}
		
	} // einde Shoppingcart
	
	class MyShoppingcart extends Item {
		public function printCart(){
			echo "<table border=1>
			<tr>
				<td>Product ID</td>
				<td>Omschrijving</td>
				<td>Prijs</td>
				<td>Aantal</td>
			</tr>";
			foreach( $this->items as $item){
				$rij = "";
				$rij .= "<tr>";
				$rij .= "<td>".$item->getId()."</td>";
				$rij .= "<td>".$item->getOmschrijving()."</td>";
				$rij .= "<td>".$item->getPrijs()."</td>";
				$rij .= "<td>".$item->getAantal()."</td>";
				$rij .= "</tr>";
				echo($rij);
			}
			echo "</table>";
		}
		//add the Item functions here?
		
		public function getTotaal(){
			$totaal = 0;
			foreach( $this->items as $item){
				$totaal += $item->getPrijs() * $item->getAantal();
			}
			return $totaal;
		}
	} // einde MyShoppingcart
	
	class Boek extends Item{
		private $titel;
		private $auteur;
		function __construct($id, $titel, $auteur, $prijs, $aantal){
			$this->id = $id;
			$this->titel = $titel;
			$this->auteur = $auteur;
			$this->prijs = $prijs;
			$this->aantal = $aantal;
		}
		function __destruct(){
			// voer de benodigde acties uit
			echo("<br>Item $this->id wordt verwijderd");
		}
		public function getOmschrijving(){
			return($this->titel . " " . $this->auteur);
		}
		public function printCart(){}
	} // einde Item
	
	class Laptop extends Item{
		private $merk;
		private $model;
		function __construct($id, $merk, $model, $prijs, $aantal){
			$this->id = $id;
			$this->merk = $merk;
			$this->model = $model;
			$this->prijs = $prijs;
			$this->aantal = $aantal;
		}
		function __destruct(){
			// voer de benodigde acties uit
			echo("<br>Item $this->id wordt verwijderd");
		}
		public function getOmschrijving(){
			return($this->merk . " " . $this->model);
		}
		public function printCart(){}
	} // einde Item
?>