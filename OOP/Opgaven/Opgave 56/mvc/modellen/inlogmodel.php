<?php
class InlogModel {
	public function getlogin(){
		if(isset($_REQUEST['naam']) && isset($_REQUEST['wachtwoord'])){
			if($_REQUEST['naam']=='admin' &&
			$_REQUEST['wachtwoord']=='admin'){
				return true;
			}else{
				return false;
			}
		}
	}
}
?>