<?php
class Persoon {
	public $naam; // +$naam = public
	private $leeftijd; // -$leeftijd = private
	protected $geslacht; // #$geslacht = protected
	function __construct($persoonnaam, $leeftijd, $geslacht){
		$this->naam = $persoonnaam;
		$this->leeftijd = $leeftijd;
		$this->geslacht = $geslacht;
		echo "<br>Nieuw Persoon object $persoonnaam aangemaakt";
	}
	function __destruct(){
		// voer de benodige acties uit;
		echo "<br>Persoon object $this->naam wordt verwijderd";
	}
	function setGeslacht($geslacht) {
		$this->geslacht = $geslacht;
	}
	function getGeslacht() {
		return $this->geslacht;
	}
	function setLeeftijd($leeftijd) {
		if(is_integer($leeftijd)) {
			$this->leeftijd = $leeftijd;
		} else {
			echo "<br>Datatype error in setLeeftijd() methode.";
		}
	}
	function getLeeftijd() {
		return $this->leeftijd;
	}
	function setNaam($persoonnaam) {
		if(is_string($persoonnaam)) {
			$this->naam = $persoonnaam;
		} else {
			echo "<br>Datatype error in setNaam() methode.";
		}
	}
	function getNaam() {
		return $this->naam;
	}
	public function printGegevens() {
		$gegevens =
		"<br>De gegevens van $this->naam zijn:
		<br>Leeftijd: $this->leeftijd
		<br>Geslacht: $this->geslacht";
		echo $gegevens;
	}
} // einde Persoon class

class User extends Persoon {
	private $email;
	private $wachtwoord;
	public $admin;
	function __construct(
		$persoonnaam,
		$leeftijd,
		$geslacht,
		$email,
		$wachtwoord,
		$admin){
			parent::__construct(
			$persoonnaam,
			$leeftijd,
			$geslacht);
			$this->email = $email;
			$this->wachtwoord = $wachtwoord;
			$this->admin = $admin;
			echo "<br>Nieuw User $persoonnaam extends Persoon";
		}
		function __destruct(){
			// voer de benodigde acties uit
			echo "<br>User object $this->naam wordt verwijderd";
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setWachtwoord($wachtwoord){
			$this->wachtwoord = $wachtwoord;
		}
		public function setAdmin($admin){
			$this->admin = $admin;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getWachtwoord(){
			return $this->wachtwoord;
		}
		public function getAdmin(){
			return $this->admin;
		}
		public function printGegevens(){
			$gegevens = parent::printGegevens();
			$gegevens .= "<br>E-mail: $this->email";
			$gegevens .= "<br>Wachtwoord: $this->wachtwoord";
			$gegevens .= "<br>Admin: $this->admin";
			echo $gegevens;
		}
	} // einde User class
	
	interface Ishoppingcart{
		public function addToCart(Item $item);
		public function printCart();
	}
	abstract class Shoppingcart implements Ishoppingcart {
		protected $items = array();
		public function addToCart($item){
			$this->items[] = $item;
		}
	} // einde Shoppingcart
	
	class MyShoppingcart extends Shoppingcart {
		public function printCart(){
			echo "<table border=1>
			<tr>
				<td>Product ID</td>
				<td>Omschrijving</td>
				<td>Prijs</td>
				<td>Aantal</td>
			</tr>";
			$var = 0;
			foreach( $this->items as $item){
				$rij = "";
				$rij .= "<tr>";
				$rij .= "<td>".$item->getId()."</td>";
				$rij .= "<td>".$item->getOmschrijving()."</td>";
				$rij .= "<td>".$item->getPrijs()."</td>";
				$rij .= "<td>".$item->getAantal()."</td>";
				$rij .= "</tr>";
				$var += $item->getTotaal();
				echo($rij);
			}
			echo "</table>";
			echo "Totaalbedrag is: ".$var;
		}
	} // einde MyShoppingcart
	
	class Item {
		private $id;
		private $merk;
		private $model;
		private $prijs;
		private $aantal;
		private $totaal;
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
		public function getId(){
			return $this->id;
		}
		public function getOmschrijving(){
			return($this->merk . " " . $this->model);
		}
		public function getPrijs(){
			return $this->prijs;
		}
		public function getAantal(){
			return $this->aantal;
		}
		public function setAantal($aantal){
			if(is_integer($aantal)) {
				$this->aantal = $aantal;
			} else {
				throw new Exception(
				"<br>Datatype Exception in setAantal() methode.");
			}
		}
		public function getTotaal(){
			return($this->aantal * $this->prijs);
		}
	} // einde Item
?>