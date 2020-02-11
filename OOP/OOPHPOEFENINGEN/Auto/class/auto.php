<?php

include_once "brandstof.php";

class auto
{
    private $merk_auto;
    private $type_auto;
    private $kenteken;
    private $type_brandstof;
    private $snelheid;

    public function __construct($merk_auto, $type_auto, $kenteken, $type_brandstof, $snelheid)
    {
        $this->setMerkAuto($merk_auto);
        $this->setTypeAuto($type_auto);
        $this->setKenteken($kenteken);
        $this->setTypeBrandstof(new brandstof($type_brandstof));
        $this->setSnelheid($snelheid);
    }

    public function getTypeBrandstof()
    {
        return $this->type_brandstof;
    }

    public function setTypeBrandstof($type_brandstof)
    {
        $this->type_brandstof = $type_brandstof;
    }

    public function versnellen($input)
    {
        $this->snelheid += $input;
    }

    public function remmen($input)
    {
        $this->snelheid -= $input;
    }

    public function displayInfo()
    {
        $br = "<br />";
        $merk = "Merk: " . $this->getMerkAuto();
        $type = "Type: " . $this->getTypeAuto();
        $getKenteken = "Kenteken: " . $this->getKenteken();
        $brandstof = "Brandstof: " . $this->type_brandstof->getBrandstofSoort();
        $brandstofColor = "Brandstof kleur: " . $this->type_brandstof->getBrandstofKleur();
        $brandstofPrice = "Brandstof prijs: $" . $this->type_brandstof->getBrandstofPrijs();
        $snelheid = "Snelheid: " . $this->getSnelheid();
        return
            $br . $merk .
            $br . $type .
            $br . $getKenteken .
            $br . $brandstof .
            $br . $brandstofColor .
            $br . $brandstofPrice .
            $br . $snelheid;
    }

    public function getMerkAuto()
    {
        return $this->merk_auto;
    }

    public function setMerkAuto($merk_auto)
    {
        $this->merk_auto = $merk_auto;
    }

    public function getTypeAuto()
    {
        return $this->type_auto;
    }

    public function setTypeAuto($type_auto)
    {
        $this->type_auto = $type_auto;
    }

    public function getKenteken()
    {
        return $this->kenteken;
    }

    public function setKenteken($kenteken)
    {
        $this->kenteken = $kenteken;
    }

    public function getSnelheid()
    {
        return $this->snelheid;
    }

    public function setSnelheid($snelheid)
    {
        $this->snelheid = $snelheid;
    }

    public function saveDatabase()
    {
        $hostname = 'localhost';
        $database = 'db_auto';
        $username = 'root';
        $password = 'root';

        $con = new mysqli($hostname, $username, $password, $database);

        if (mysqli_connect_errno()) die(mysqli_connect_error());

        $query = "INSERT INTO `auto`(`merk`, `type`, `kenteken`, `snelheid`, `brandstof_id`) 
                  VALUES ('$this->merk_auto', '$this->type_auto', '$this->kenteken', $this->snelheid, 1)";

        var_dump($query);

        $con->query($query) or die($con->error . __LINE__);

        echo "<h4>Database updated!</h4>";
    }
}
