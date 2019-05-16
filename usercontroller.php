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


$usernamevalidate =  $firstnamevalidate = 
$lastnamevalidate = $emailvalidate = 
$passwordvalidate = $passwordvalidate2 = 
$gendervalidate = $dobvalidate = $socialnumbervalidate =
$cityvalidate = "";


if(isset($_POST['signup_submit']))
{
	$firstname = $_POST['FName'];
	$lastname = $_POST['LName'];
	$username = $_POST['UName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$encrpassword = sha1($password);
	$password2 = $_POST['password2'];
	$encrpassword2 = sha1($password2);
	$Gender = $_POST['gender'];
	$socialnumber = $_POST['SSN'];	
	$dob = $_POST['DOB'];
	$gender=$_POST['gender'];
	//$City = $_POST['City'];

	$user= new user();
	$user->email=$email;
	$user->password=$encrpassword;
	$user->password2=$encrpassword2;
	$user->firstname=$firstname;
	$user->lastname=$lastname;
	$user->username=$username;
	//$user->City=$City;
	$user->dob=$dob;
	$user->socialnumber=$socialnumber;
	$user->$gender=$gender;
	$user->adduser($user);

}
if(isset($_POST['edit']))
{
	$F =$_POST["FName"];
	$L =$_POST["LName"];
	$E =$_POST["Email"];
	$S =$_POST["socialnumber"];
	$P =sha1($_POST["Password"]);
	$D =$_POST["dob"];
	$U =$_POST["username"];
	$ID = $_SESSION['ID'];
	$usernamevalidate =  $firstnamevalidate = 
	$lastnamevalidate = $emailvalidate = 
	$passwordvalidate = $gendervalidate = $dobvalidate = 
	$socialnumbervalidate = $cityvalidate = "";
	$DB=database::getinstance();
	$result = $DB->query("user", "isdeleted='false' and username ='$U'");
	$result2 = $DB->query("user", "isdeleted='false' and email ='$E'");
	if(mysqli_num_rows($result)>0)
	{
		$usernamevalidate = "Username already taken!.";
		header("Location:EditProfile.php");
	}
	if(!preg_match("/^[0-9a-zA-Z_]{5,}$/", $U))
	{
		$usernamevalidate = "User must be bigger that 5 chars and contain only digits, letters and underscore";
		header("Location:EditProfile.php");
	}
	else if(!preg_match('/^[\p{L} ]+$/u', $F))
	{
		$firstnamevalidate = "First Name must contain letters and spaces only!";
		header("Location:EditProfile.php");
	}
	else if(!preg_match('/^[\p{L} ]+$/u', $L))
	{
		$lastnamevalidate = "Last Name must contain letters and spaces only!";
		header("Location:EditProfile.php");
	}
	else if(mysqli_num_rows($result2)>0)
	{
		$usernamevalidate = "E-mail already taken!.";
		header("Location:EditProfile.php");
	}
	else if(!filter_var($E, FILTER_VALIDATE_EMAIL))
	{
		$emailvalidate = "Invalid email format.";
		header("Location:EditProfile.php");
	}
	else if(!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z]).*$/", $P))
	{
		$passwordvalidate = "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit";
		header("Location:EditProfile.php");
	}
	else if($S < 0)
	{
		$socialnumbervalidate = "Social number cannot be negative values.";
		header("Location:EditProfile.php");
	}
	else
	{
		$result = $DB->update7query("user","firstname","lastname","email","socialnumber","password","dob","username" , "'$F'", "'$L'","'$E'" , "'$S'", "'$P'","'$D'", "'$U'"," id = '$ID'");
		if($result)
		{
			$_SESSION["FirstName"] = $_POST["FName"];
			$_SESSION["LastName"] = $_POST["LName"];
			$_SESSION["Email"] = $_POST["Email"];
			$_SESSION["username"] = $_POST["username"];
			// header("Location:index.php");
		}
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