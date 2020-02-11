<?php

error_reporting(E_ALL);

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

require_once('class.RechteMuur.php');

class Steen
{
    private $breedte = 0.0;
    private $hoogte = 0.0;
    private $prijs = 0.0;
    private $gewicht = 0.0;
    private $lengte = 0.0;

    public function __construct($breedte = 10, $lengte = 20, $hoogte = 10, $prijs = 0.4, $gewicht = 0.5)
    {
        $this->breedte = $breedte;
        $this->lengte = $lengte;
        $this->hoogte = $hoogte;
        $this->prijs = $prijs;
        $this->gewicht = $gewicht;
    }

    public function getGewicht()
    {
        return $this->gewicht;
    }

    public function getPrijs()
    {
        return $this->prijs;
    }

    public function getHoogte()
    {
        return $this->hoogte;
    }
	
    public function getLengte()
    {
        return $this->lengte;
    }
	
	public function getBreedte()
    {
        return $this->breedte;
    }

} /* end of class Steen */

?>