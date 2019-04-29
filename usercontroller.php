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
    $DB=database::getinstance();   

    $F =$_POST["FName"];
    $L =$_POST["LName"];
    $E =$_POST["Email"];
    $S =$_POST["socialnumber"];
    $P =sha1($_POST["Password"]);
    $D =$_POST["dob"];
    $U =$_POST["username"];
    $ID = $_SESSION['ID'];

    $result = $DB->update7query("user","firstname","lastname","email","socialnumber","password","dob","username" , "'$F'", "'$L'","'$E'" , "'$S'", "'$P'","'$D'", "'$U'"," id = '$ID'");
       if($result){
            $_SESSION["FirstName"] = $_POST["FName"];
            $_SESSION["LastName"] = $_POST["LName"];
            $_SESSION["Email"] = $_POST["Email"];
            $_SESSION["username"] = $_POST["username"];
            // header("Location:index.php");
        }
    }
class usercontroller
{


static function shownavbar()
	{
		$view = new userview();
		$view->navbar();
	}
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