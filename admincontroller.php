<?php 

require_once 'user.php';
require_once 'userview.php';
require_once 'admin.php';
require_once 'usertype.php';
require_once 'radiology.php';
require_once 'radiologyview.php';

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
$admin = new admin();
$user->username = $_POST['UName'];
$user->email= $_POST['email'];
$user->password = $encrpassword;
$user->id=$_POST['user'];
$user->usertypeid=$_POST['role'];

$admin->adminedituser($user);
}

if(isset($_POST['doeditadminrad']))
{
  $R = $_POST['name'];
  $P = $_POST['price'];
  $ID = $_POST['rad'];
  $Rad = new radiology();
  $admin = new admin();
  $Rad->name = $R;
  $Rad->price = $P;
  $Rad->id = $ID;
  $admin->editradiology($Rad);
  header("Location:index.php");
}

if(isset($_POST['dodeleteadminrad']))
{
  $ID = $_POST['rad'];
  $Rad = new radiology();
  $admin = new admin();
  $Rad->id = $ID;
  $admin->deleteradiology($Rad); 
  header("Location:index.php");
}

if(isset($_POST['docreateadminrad']))
{
  $R = $_POST['name'];
  $P = $_POST['price'];
  $Rad = new radiology();
  $admin = new admin();
  $Rad->name = $R;
  $Rad->price = $P;
  $admin->addradiology($Rad);  
  header("Location:index.php");
}
?>