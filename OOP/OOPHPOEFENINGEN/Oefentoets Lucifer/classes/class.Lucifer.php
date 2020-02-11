<?php

error_reporting(E_ALL);

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

require_once('class.LuciferDoos.php');

class Lucifer
{
    private $prijs_lucifer = 0.0;
	
    public function __construct($prijs = 0.01)
    {
        $this->prijs_lucifer = $prijs;
    }

    public function getPrijs()
    {
        if (is_numeric($this->prijs_lucifer)) {
            return $this->prijs_lucifer;
        }
    }

} /* end of class Lucifer */

?>