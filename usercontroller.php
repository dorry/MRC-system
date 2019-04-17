<?php 
require_once 'user.php';
require_once 'userview.php';

if(isset($_POST['doadmindeleteuser']))
{


  $ID = $_POST['user'];
  $user = new user();
  $user->id = $ID;
  $user->admindeleteuser($user); 
  header("Location:index.php");


}


if(isset($_POST['admindoedituser']))
{
$password = $_POST['password'];
$encrpassword = sha1($password);

$user = new user();
$user->username = $_POST['UName'];
$user->email= $_POST['email'];
$user->password = $encrpassword;
$user->id=$_POST['user'];
$user->usertypeid=$_POST['role'];

$user->adminedituser($user);
}

class usercontroller{

static  function showedituser(){


	$view = new userview();
	$view->showedituserform();

}


static function viewdropdown(){
		$view = new userview();
		$view->showuserdropdown();
	}


	static function view(){
		$view = new userview();
		$view->showuser();
	}


}
?>