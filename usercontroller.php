<?php 
require_once 'user.php';
require_once 'userview.php';


class usercontroller
{
	static  function showedituser()
	{
		$view = new userview();
		$view->showedituserform();
	}

	static function viewdropdown()
	{
		$view = new userview();
		$view->showuserdropdown();
	}

	static function view()
	{
		$view = new userview();
		$view->showuser();
	}
}
?>