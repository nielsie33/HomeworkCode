<?php

include_once 'Vis.php';
include_once 'Slak.php';

class Aquarium
{
    private $lengte = 0.00;
    private $breedte = 0.00;
    private $hoogte = 0.00;
    private $vis = '';
    private $slak = '';
    private $aantal_vis = 0;
    private $aantal_slak = 0;

    public function __construct($lengte = 0.00, $breedte = 0.00, $hoogte = 0.00, $aantal_vis, $aantal_slak)
    {
        $this->setLengte($lengte);
        $this->setBreedte($breedte);
        $this->setHoogte($hoogte);
        $this->setVis(new vis());
        $this->setSlak(new slak());
        $this->setAantalVis($aantal_vis);
        $this->setAantalSlak($aantal_slak);
    }

    public function getVis()
    {
        return $this->vis;
    }

    public function setVis($vis)
    {
        $this->vis = $vis;
    }

    public function getSlak()
    {
        return $this->slak;
    }

    public function setSlak($slak)
    {
        $this->slak = $slak;
    }

    public function getAantalVis()
    {
        return $this->aantal_vis;
    }

    public function setAantalVis($aantal_vis)
    {
        $this->aantal_vis = $aantal_vis;
    }

    public function getAantalSlak()
    {
        return $this->aantal_slak;
    }

    public function setAantalSlak($aantal_slak)
    {
        $this->aantal_slak = $aantal_slak;
    }

    public function getPrijsInhoud()
    {
        return round($this->getInhoud() * 3.2);
    }

    public function getInhoud()
    {
        return round($this->getLengte() * $this->getBreedte() * $this->getHoogte());
    }

    public function getLengte()
    {
        return $this->lengte;
    }

    public function setLengte($lengte)
    {
        $this->lengte = $lengte;
    }

    public function getBreedte()
    {
        return $this->breedte;
    }

    public function setBreedte($breedte)
    {
        $this->breedte = $breedte;
    }

    public function getHoogte()
    {
        return $this->hoogte;
    }

    public function setHoogte($hoogte)
    {
        $this->hoogte = $hoogte;
    }

}