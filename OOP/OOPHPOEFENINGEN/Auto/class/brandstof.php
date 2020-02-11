<?php

class brandstof
{
    private $brandstofSoort = "";
    private $brandstofKleur = "";
    private $brandstofPrijs = 0.00;

    public function __construct($typeBrandstof)
    {
        $this->setBrandstofSoort($typeBrandstof);
        $this->setBrandstofProperties();
    }

    public function setBrandstofProperties()
    {
        switch (strtoupper($this->getBrandstofSoort())) {
            case "DIESEL":
                $this->setBrandstofKleur("Brown");
                $this->setBrandstofPrijs(0.59);
                break;
            case "BENZINE":
                $this->setBrandstofKleur("Dark Brown");
                $this->setBrandstofPrijs(0.78);
                break;
            case "LPG":
                $this->setBrandstofKleur("Transparent Grey");
                $this->setBrandstofPrijs(0.23);
                break;
            default:
                $this->setBrandstofKleur("Undefined Or Unsupported value given");
                $this->setBrandstofPrijs(0.00);
        }
    }

    public function getBrandstofSoort()
    {
        return $this->brandstofSoort;
    }
	
    public function setBrandstofSoort($brandstofSoort)
    {
        $this->brandstofSoort = $brandstofSoort;
    }
	
    public function getBrandstofKleur()
    {
        return $this->brandstofKleur;
    }

    public function setBrandstofKleur($brandstofKleur)
    {
        $this->brandstofKleur = $brandstofKleur;
    }

    public function getBrandstofPrijs()
    {
        return $this->brandstofPrijs;
    }

    public function setBrandstofPrijs($brandstofPrijs)
    {
        $this->brandstofPrijs = $brandstofPrijs;
    }
}
