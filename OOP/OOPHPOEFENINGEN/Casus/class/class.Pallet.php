<?php

error_reporting(E_ALL);

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

require_once('class.Product.php');
require_once('class.Vrachtwagenoplegger.php');

class Pallet
{
    private $lengte = 0.0;
    private $breedte = 0.0;
    private $product = null;
    private $aantal = 0;

    public function __construct($lengte = 1.20, $breedte = 0.80, $aantal = 40)
    {
        $this->lengte = $lengte;
        $this->breedte = $breedte;
        $this->aantal = $aantal;
        $this->product = new Product();
    }
	
    public function getLengte()
    {
        $returnValue = (float)0.0;
        $returnValue = $this->lengte;
        return (float)$returnValue;
    }

    public function setLengte($lengte)
    {
        $returnValue = (float)0.0;
        $this->lengte = $lengte;
        return (float)$returnValue;
    }

    public function setAantalProducten($aantal)
    {
        $this->aantal = $aantal;
    }

    public function getAantalProducten()
    {
        return $this->aantal;
    }

    public function getWaarde()
    {
        return $this->aantal * $this->product->getPrijs();
    }

    public function getProductType()
    {
        return $this->product->getType();
    }

    public function getBreedte()
    {
        return $this->breedte;
    }

    public function setBreedte($breedte)
    {
        $this->breedte = $breedte;
    }

} /* end of class Pallet */

?>