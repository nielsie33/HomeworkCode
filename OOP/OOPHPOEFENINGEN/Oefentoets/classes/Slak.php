<?php

include_once 'AquariumObject.php';

class Slak extends AquariumObject
{
    public function __construct($prijs = 0.75, $ruimte = 1300)
    {
        parent::__construct($prijs, $ruimte);
    }
}