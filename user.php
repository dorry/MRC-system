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
public $City;

static function adduser ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    if(isset($_POST['signup_submit'])){ 
	
        if($_POST['password'] = $_POST['password2']){
        
            
            $sql7 = "SELECT id FROM `address` WHERE name='$obj->City'";
            $result7 = mysqli_query($conn, $sql7);
            while ($x = mysqli_fetch_array($result7)) {
            $CIDs= $x[0];
            }
        //=========================================================================================
        
            $sql = "Insert INTO user (firstname,lastname,username,email,Password,usertypeid,addressid,socialnumber,dob)  	
             values('$obj->firstname','$obj->lastname','$obj->username','$obj->email','$obj->password','2','$CIDs','$obj->socialnumber','$obj->dob')" ;
            mysqli_query($conn,$sql);
                   header("Location:index.php");
        
        
        }
        else{
        
        echo "<script>alert('Passwords written are not the same')</script>";
                   header("Location:index.php");
        
        }
        
        
        
        
        }

}


static function edituser ($obj)
{



}

static function deleteuser ()
{
    $DB=new database();
        $conn=$DB->DBC();
    session_start();
    if(!empty($_SESSION))
    {
        $query = "Delete From user WHERE username = '".$_SESSION["username"]."'";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        session_unset();
        header("Location:index.php");
    }
    else
    {
      header("Location:index.php");
    }


}


static function login($username,$password)
    {
        $DB=new database();
        $conn=$DB->DBC();
        session_start();

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
        if(!empty($_SESSION))
        {
            header("Location:index.php");
        }
        else
        {
          
        }
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