<?php 
require_once 'useroptions.php';
require_once 'useroptionsview.php';
class useroptionscontroller
{

static function viewdropdown(){
		$view = new useroptionsview();
		$view->showoptiondropdown();
	}

static function viewgiveform(){
		$view = new useroptionsview();
		$view->showgiveform();
}

static function viewediteavtypeform(){
		$view = new useroptionsview();
		$view->showediteavtypeform();
}
static function vieweavtypeform(){
		$view = new useroptionsview();
		$view->showeavtypeform();
}

static function viewcreateform(){
		$view = new useroptionsview();
		$view->showcreateform();
}

static function viewdeleteform(){
		$view = new useroptionsview();
		$view->showdeleteform();
}
static function vieweditform(){
		$view = new useroptionsview();
		$view->showeditform();
}



}
?>