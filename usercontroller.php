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
if(isset($_POST['edit'])){ 
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "update user set firstname = '" . $_POST["FName"] . 
    "' , lastname ='" . $_POST["LName"] .  
    "' , email ='" . $_POST["Email"] . 
    "' , socialnumber ='" . $_POST["socialnumber"] . 
    "' , password ='" . sha1($_POST["Password"]). 
    "' , dob ='" . $_POST["dob"] .  
    "' , username ='" . $_POST["username"] . "' WHERE id ='".$_SESSION['ID']."'";
    $result = mysqli_query($conn, $sql);
       if($result){
            $_SESSION["FirstName"] = $_POST["FName"];
            $_SESSION["LastName"] = $_POST["LName"];
            $_SESSION["Email"] = $_POST["Email"];
            $_SESSION["username"] = $_POST["username"];
            // header("Location:index.php");
        }
        else{return $sql;}
    }
class usercontroller
{

static function viewmyprofileedit($lid)
	{
		$view = new userview();
		$view->showprofileedit($lid);
	}

	static function viewmyprofile($lid)
	{
		$view = new userview();
		$view->showprofile($lid);
	}
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