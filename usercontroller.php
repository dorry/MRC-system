<?php 
require_once 'user.php';
require_once 'userview.php';
//$view = new userview();
class usercontroller{

	static function view(){
		$view = new userview();
		$view->showuser();
	}

}
?>