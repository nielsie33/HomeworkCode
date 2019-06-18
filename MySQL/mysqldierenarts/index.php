<?php include_once 'config/dbconfig.php'; ?>
<?php 
session_start();
switch (filter_input(INPUT_GET, 'page')) {
    case 'gebruikers':
        include_once 'pages/gebruikersf.php';
        break;
		
	case 'afspraken':
        include_once 'pages/afsprakenf.php';
        break;
		
	case 'huisdieren':
        include_once 'pages/huisdierenf.php';
        break;
		
	case 'afsprakenoverzicht':
        include_once 'pages/overzichtafspraken.php';
        break;
		
	case 'uitloggen':
        include_once 'pages/uitloggen.php';
        break;
		
	default:
        include_once 'pages/inloggen.php';
}
?>