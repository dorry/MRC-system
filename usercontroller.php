<?php 
require_once 'user.php';
require_once 'userview.php';
class usercontroller
{


	static function showmyres($lid){

		$view = new userview();
		$view->showformyres($lid);

	}
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
		static function viewdropdowneav($rid)
	{
		$view = new userview();
		$view->showuserdropdowneav($rid);
	}

	static function view()
	{
		$view = new userview();
		$view->showuser();
	}
}
?>