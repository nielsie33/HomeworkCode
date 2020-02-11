<?php

include_once 'AquariumObject.php';

class Vis extends AquariumObject
{
    public function __construct($prijs = 2.5, $ruimte = 2500)
    {
        parent::__construct($prijs, $ruimte);
    }
}