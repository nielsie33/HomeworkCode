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
} // einde Persoon class
?>