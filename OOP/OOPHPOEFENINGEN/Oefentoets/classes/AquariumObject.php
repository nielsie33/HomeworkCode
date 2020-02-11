<?php

class AquariumObject
{
    private $prijs = 0.00;
    private $ruimte = 0;

    public function __construct($prijs, $ruimte)
    {
        $this->prijs = $prijs;
        $this->ruimte = $ruimte;
    }

    public function getPrijs()
    {
        return $this->prijs;
    }

    public function setPrijs($prijs)
    {
        $this->prijs = $prijs;
    }

    public function getRuimte()
    {
        return $this->ruimte;
    }

    public function setRuimte($ruimte)
    {
        $this->ruimte = $ruimte;
    }


}