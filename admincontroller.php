<?php 

require_once 'user.php';
require_once 'userview.php';
require_once 'admin.php';
require_once 'usertype.php';

//USER TYPE MANAGER 

if(isset($_POST['dodeletetype']))
{
$Rid = $_POST['role'];
$admin = new admin();
$UT = new usertype();
$UT->id = $Rid;

$admin->deleteusertype($UT); 
    header("Location:Roles.php");

}

if(isset($_POST['doedittype']))
{
$Rid = $_POST['role'];
$name = $_POST['newname'];
$admin = new admin();
$UT = new usertype();
$UT->id = $Rid;
$UT->type= $name;

$admin->editusertype($UT); 
}

if(isset($_POST['docreatetype']))
{
  $admin = new admin();
  $R = $_POST['name'];
  $usertype = new usertype();
  $usertype->type = $R;

  $admin->addusertype($usertype);   
}


//USER MANAGER

if(isset($_POST['doadmindeleteuser']))
{
  $ID = $_POST['user'];
  $user = new user();
  $admin = new admin();
  $user->id = $ID;
  $admin->admindeleteuser($user); 
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
?>