<?php

error_reporting(E_ALL);

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

require_once('class.Steen.php');

class RechteMuur
{
    private $afgeronde_lengte = 0.0;
    private $afgeronde_hoogte = 0.0;
    private $steen = null;

    public function __construct($lengte = '', $hoogte = '')
    {
        $this->steen = new Steen();
    }

    public function setHoogteMuur($hoogte)
    {
        if (is_numeric($hoogte) && !empty($hoogte)) {
            $this->afgeronde_hoogte = round($hoogte / $this->steen->getHoogte(), 0) * $this->steen->getBreedte();
        }
    }

    public function setLengteMuur($lengte)
    {
        if (is_numeric($lengte) && !empty($lengte)) {
            $this->afgeronde_lengte = round($lengte / $this->steen->getLengte(), 0) * $this->steen->getBreedte();
        }
    }

    public function getGewicht()
    {
        return $this->getAantalStenen() * $this->steen->getGewicht();
    }

    public function getAantalStenen()
    {
        $aantal_lengte = $this->afgeronde_lengte / $this->steen->getLengte();
        $aantal_hoogte = $this->afgeronde_hoogte / $this->steen->getHoogte();
        return round($aantal_lengte * $aantal_hoogte);
    }

    public function getPrijs()
    {
        $prijs = $this->getAantalStenen() * $this->steen->getPrijs();
        return number_format($prijs, 2, '.', '');
    }

} /* end of class RechteMuur */

?>