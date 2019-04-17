<?php 
require_once 'usertype.php';
require_once 'usertypeview.php';



class usertypecontroller{

static function showedittype(){
		$view = new usertypeview();
		$view->edittypeform();
}

static function showcreatetype(){
		$view = new usertypeview();
		$view->createtypeform();
}

static function viewtypes(){
		$view = new usertypeview();
		$view->showusertypes();
}
static function viewdropdown(){
		$view = new usertypeview();
		$view->showusertypedropdown();
	}





}
?>