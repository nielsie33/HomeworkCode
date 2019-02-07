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
?>