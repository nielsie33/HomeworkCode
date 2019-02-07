<?php

class Model {
	public $text;
	public function __construct() {
		$this->text = 'Hello world!';
	}
}

class View {
	private $model;
	
	public function __construct($model) {
		$this->model = $model;
	}
	
	public function output() {
		return '<h1>' . $this->model->text .'</h1>';
	}
}

class Controller {
	private $model;
	
	public function __construct($model) {
		$this->model = $model;
	}
}

//creeër het drietal
$model = new Model();
$controller = new Controller($model);
$view = new View($model);

echo $view->output();
?>
		