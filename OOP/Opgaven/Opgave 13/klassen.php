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
} // einde Persoon class
?>