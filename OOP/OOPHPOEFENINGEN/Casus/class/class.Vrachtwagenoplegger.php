<?php

error_reporting(E_ALL);

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

require_once('class.Pallet.php');

class Vrachtwagenoplegger
{
    private $aantal_pallets = 0;
    private $pallet = null;
	
    public function __construct($lengte = 13.40, $breedte = 2.55)
    {
        $this->pallet = new Pallet();
        $this->aantal_pallets = floor($lengte / $this->pallet->getLengte()) * floor($breedte / $this->pallet->getBreedte());
    }

    public function getAantalPallets()
    {
        return $this->aantal_pallets;
    }

    public function setAantalPallets($aantal)
    {
        $this->aantal_pallets = $aantal;
    }

    public function getProductType()
    {
        return $this->pallet->getProductType();
    }

    public function getWaarde()
    {
        $totale_waarde = $this->pallet->getWaarde() * $this->aantal_pallets;
        return $totale_waarde;
    }

    public function getWaardePallet()
    {
        return $this->pallet->getWaarde();
    }
} /* end of class Vrachtwagenoplegger */

?>