<?php
	function call($drietalNaam, $action) {
	require_once('controllers/'.$drietalNaam.'Controller.php');
	
	// kies een controller
	switch($drietalNaam) {
		case 'Inlog':
			$controller = new InlogController();
			break;
		case 'Lijst':
			$controller = new LijstController();
			break;
	}
	
	// voer de actie uit
	$controller->{ $action }();
	}
	call($_GET['drietalNaam'], $_GET['action']);
?>