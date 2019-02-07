<?php
class Persoon {
	public $naam;
	private $leeftijd;
	protected $geslacht;
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
		$this->leeftijd = $leeftijd;
		echo "<br>Leeftijd van $this->naam omgezet in: $this->leeftijd";
	}
	function getLeeftijd() {
		return $this->leeftijd;
	}
} // einde Persoon class
?>