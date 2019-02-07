<?php
include_once("modellen/LijstModel.php");
class LijstController {
	public $model;
	public function __construct(){
		$this->model = new LijstModel();
	}
	
	public function getlijst(){
		echo "Alle albums!<br><br>";
		$albumrows = $this->model->lijst();
		include 'views/LijstView.php';
	}
}
?>