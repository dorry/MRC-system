<?php 
require_once 'user.php';
require_once 'userview.php';


if(isset($_POST['signin_submit']))
{ 
$username=$_POST['username'];
$password=$_POST['password'];
$encrpassword = sha1($password);
$user= new user();
$user->login($username,$encrpassword);
}

if(isset($_POST['signup_submit']))
{ 
$firstname = $_POST['FName'];
$lastname = $_POST['LName'];
$username = $_POST['UName'];
$email = $_POST['email'];
$password = $_POST['password'];
$encrpassword = sha1($password);
$Gender = $_POST['gender'];
$socialnumber = $_POST['SSN'];	
$dob = $_POST['DOB'];
$City = $_POST['City'];

$user= new user();
$user->email=$email;
$user->password=$encrpassword;
$user->firstname=$firstname;
$user->lastname=$lastname;
$user->username=$username;
$user->City=$City;
$user->dob=$dob;
$user->socialnumber=$socialnumber;

$user->adduser($user);
}
class usercontroller
{

	static function viewsignup()
	{
		$view = new userview();
		$view->signupform();
	}

	static function viewsignin()
	{
		$view = new userview();
		$view->signinform();
	}

		
}
?>