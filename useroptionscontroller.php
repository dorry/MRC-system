<?php 
require_once 'useroptions.php';
require_once 'useroptionsview.php';
class useroptionscontroller
{


static function viewcreateform(){
		$view = new useroptionsview();
		$view->showcreateform();
}





}
?>