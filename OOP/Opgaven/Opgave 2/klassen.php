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
} // einde Persoon class
?>