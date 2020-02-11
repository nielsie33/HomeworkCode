<?php

error_reporting(E_ALL);

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

require_once('class.Pallet.php');

class Product
{
    private $prijs = 0.0;
    private $type = '';

    public function __construct($prijs = 7.50, $type = "Klasse 7")
    {
        $this->prijs = $prijs;
        $this->type = $type;
    }

    public function getPrijs()
    {
        return $this->prijs;
    }

    public function setPrijs($prijs)
    {
        $this->prijs = $prijs;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
} /* end of class Product */

?>