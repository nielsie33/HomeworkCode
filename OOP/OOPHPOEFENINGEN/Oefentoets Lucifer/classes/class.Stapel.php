<?php

error_reporting(E_ALL);

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

require_once('class.LuciferDoos.php');

class Stapel
{
    private $hoogte_stapel = 0.0;
    private $doosje = null;

    public function __construct($hoogte)
    {
        $this->doosje = new LuciferDoos($hoogte, 1);
    }

    public function setHoogte($hoogte)
    {
        if (is_numeric($hoogte)) {
            $this->hoogte_stapel = $hoogte;
        }
    }

    public function getPrijsLucifers()
    {
        return round($this->getAantalLucifers() * $this->doosje->getLucifer()->getPrijs());
    }

    public function getAantalLucifers()
    {
        return round($this->getAantalDoosjes() * $this->doosje->getAantalLucifersPerDoosje());
    }

    public function getAantalDoosjes()
    {
        return round($this->hoogte_stapel / $this->doosje->getHoogte());
    }

} /* end of class Stapel */

?>