<?php 
require_once 'user.php';
require_once 'userview.php';
class usercontroller
{


	static function showmyres($lid){

		$view = new userview();
		$view->showformyres($lid);

	}


		
}
?>