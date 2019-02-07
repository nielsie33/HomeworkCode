<?php
	setcookie("user", "", time()-3600);
	if(isset($_COOKIE["user"])) {
		echo $_COOKIE["user"];
	} else {
		echo "Cookie is verwijderd.";
	}
?>