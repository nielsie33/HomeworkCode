<?php

error_reporting(E_ALL);

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}
require_once('class.Lucifer.php');
require_once('class.Stapel.php');

class LuciferDoos
{
    private $hoogte_doosje = 2.0;
    private $aantal_lucifers_per_doosje = 100;
    private $Lucifer = null;

    public function __construct($hoogte = 2, $aantal = null)
    {
        $this->Lucifer = new Lucifer();
    }

    public function getAantalLucifersPerDoosje()
    {
        if (is_numeric($this->aantal_lucifers_per_doosje)) {
            return $this->aantal_lucifers_per_doosje;
        }
    }

    public function getHoogte()
    {
        if (is_numeric($this->hoogte_doosje)) {
            return $this->hoogte_doosje;
        }
    }

    public function getLucifer()
    {
        return $this->Lucifer;
    }

} /* end of class LuciferDoos */

?>