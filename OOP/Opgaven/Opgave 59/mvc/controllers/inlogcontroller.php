<?php
include_once("modellen/InlogModel.php");
class InlogController {
	public $model;
	public function __construct(){
		$this->model = new InlogModel();
	}
	
	public function inloggen(){
		$success = $this->model->getlogin();
		if($success){
			$melding = "U bent ingelogd!";
			include 'views/WelkomView.php';
		}else{
			$melding = "Ongeldig gebruikersnaam of wachtwoord!";
			include 'views/InlogView.php';
		}
	}
}
?>