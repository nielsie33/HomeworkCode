<?php
	$playlist = array (
	array("genre" => "hiphop", "auteur" => "John Williams", "titel" => "My Girl"),
	array("genre" => "Jazz", "auteur" => "John Coltrane", "titel" => "New York"),
	array("genre" => "hiphop", "auteur" => "Shakira", "titel" => "Obsession"),
	);
	function printArray($item, $key)
	{
		echo "<br>$key" . ": " . "<i> $item </i>";
	}
	echo "----- Stap 1: Mijn playlist:";
	array_walk_recursive($playlist, 'printArray');
	
	$nieuwetrack = array (
	array("genre" => "Latin", "auteur" => "Caetano Veloso", "titel" => "Cafe Atlantico")
	);
	echo "<br><br>----- Stap 2: Track toevoegen:";
	$playlist = array_merge($playlist, $nieuwetrack);
	array_walk_recursive($playlist, "printArray");
	
	function printTracks($item, $key)
	{
		echo "<br>Track $key: ".implode("|",$item)."";
	}
	echo "<br><br>----- Stap 3: Tracks doorlopen:";
	array_walk($playlist, 'printTracks');	
?>