<?php
include"mydatabaseconnection.php";

class user
{
public $addressid;
public $dob;
public $email;
public $firstname;
public $lastname;
public $id;
public $password;
public $socialnumber;
public $username;
public $usertypeid;


static function adduser ($obj)
{



}


static function edituser ($obj)
{



}

static function deleteuser ($obj)
{



}


static function login($username,$password)
    {
        $DB=new database();
        $conn=$DB->DBC();
        session_start();
        echo "<script>console.log('Alley');</script>";

        if(isset($_POST['signin_submit']))
        { 
            echo "<script>alert('here')</script>";

            $sql = "select * from user where
             username = '$username' and 
             password = '$password'";
             $result = mysqli_query($conn, $sql);
        
            if($row = mysqli_fetch_array($result))
            {
                echo "<script>alert('Selected sucess')</script>";
                  $typeId = $row["usertypeid"];
                $_SESSION["FirstName"] = $row["firstname"];
                $_SESSION["LastName"] = $row["lastname"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["Password"] = $row["password"];
                $_SESSION["ID"] = $row["id"];
                $sql2="SELECT * FROM `usertypelinks` WHERE typeId = $typeId";
                $result2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_array($result2))
                {
                    $linkId = $row2["linkid"];
                    $sql3="SELECT * FROM `links` WHERE id = $linkId";
                    $result3 = mysqli_query($conn, $sql3);
                    if($row3 = mysqli_fetch_array($result3))
                    {
                        $_SESSION['link'] = $row3["physicallink"];
                        $_SESSION['pagename'] = $row3["linkname"];
                    }
                }
                echo $_SESSION["link"];
                header("Location:index.php");
            }
            else
            {
                header("Location:signin.html");
                echo "<script>alert('Invalid username or password')</script>";
            }
        
    }
    }
static function logout()
    {
     
        session_start();
        session_unset();
        header("Location:index.php");

    }

public function __construct()
    {
        $DB=new database();
        $conn=$DB->DBC();

    }
}
?>