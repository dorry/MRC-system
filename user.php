<?php
require_once"mydatabaseconnection.php";
require_once"reserve.php";
require_once"IReport.php";
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

  public function setview($lid)
  {
        $DB=database::getinstance();  
        $result=$DB->updatequery("notifications","isviewed", "true" ,"uid = '$lid'");
  }

static function selectuserformyres($lid)
{
  $DB=database::getinstance();  
  $PId = reserve::selectmyres($lid);  
  $length = count($PId);
  $array;
  for ($i=0; $i<$length;$i++)
  { 
    $DID = $PId[$i]['DoctorID'];
    $result = $DB->query("user", "id= '$DID'");
        while($row = mysqli_fetch_array($result))
       {
    $array[$i] = $row;
   } 
}
  $length2 = count($PId);
  if($length2==0){return;}
  else return $array;
}
static function selectformyres($lid)
{
  $DB=database::getinstance();  
  $PId = reserve::selectmyres($lid);  
  $length = count($PId);
  $array;
  for ($i=0; $i<$length;$i++)
  { 
    $DID = $PId[$i]['PatientID'];
    $result = $DB->query("user", "id= '$DID'");
        while($row = mysqli_fetch_array($result))
       {
    $array[$i] = $row;
    }
   } 
     $length2 = count($PId);
  if($length2==0){return;}
  else return $array;
}



static function selectforresview()
{
  $DB=database::getinstance();    
  $PId = reserve::selectforviewadmin();  
  $length = count($PId);
  $array;
  for ($i=0; $i<$length;$i++)
  { 
    $ID=$PId[$i]['PatientID']; 
    $result = $DB->query("user", "id= '$ID'");
        while($row = mysqli_fetch_array($result))
       {
    $array[$i] = $row;
   } 
 }
   $length2 = $PId;
  if($length2==0){return;}
  else return $array;
}

static function selectdocforresview()
{
  $DB=database::getinstance();
  $DrId = reserve::selectforviewadmin();  
  $length = count($DrId);
  $array;
  for ($i=0; $i<$length;$i++)
  { 
    $ID=$DrId[$i]['DoctorID']; 
    $result = $DB->query("user", "id= '$ID'");
     while($row = mysqli_fetch_array($result)){$array[$i] = $row;}
 } 
 
  return $array;

}

static function selectauserseav($id){

  $DB=database::getinstance();
  $result = $DB->query("user", "usertypeid= '$id' and isdeleted='false'");
  $i = 0;
  $array;
      while($row = mysqli_fetch_array($result))
       {
        $array[$i]=$row;
        $i++;
       }
       if($i>0)
      return $array;
    else return;
}


static function selectallusers(){
  $DB=database::getinstance();
  $result = $DB->query("user", "isdeleted='false'");

  $i = 0;
  $array;  
   while($row = mysqli_fetch_array($result))
       {
        $array[$i]=$row;
        $i++;
       }
      return $array;

  
}

static function retrivedoctorsforeditres()
{
  $DB=database::getinstance();   
  $result4 = $DB->query("user", "isdeleted='false' 
    and usertypeid = (select id from usertype where type = 'doctor')");
    $i = 0;
    $array;
       while($row = mysqli_fetch_array($result4))
      {
        $array[$i]=$row;
        $i++;
      }
      return $array;
}

static function RetrieveProfileForUser($lid)
{
    $DB=database::getinstance();   
    $sql4 = "SELECT  *  FROM `user` WHERE id='$lid' and isdeleted='false'";
    $result4 = $DB->query("user", "id= '$lid'");
    $i = 0;
    $array;
    while($row = mysqli_fetch_array($result4))
      {
        $array[$i]=$row;
        $i++;
      }
      return $array;
}
static function PROTOTYPE(){
    $DB=new database();
    $conn=$DB->DBC();
    $sql4 = "SELECT  *  FROM `user` WHERE id=".$_SESSION['ID']." and isdeleted='false'";
    $result4 = mysqli_query($conn, $sql4);
    if(mysqli_num_rows($result4) > 0){
       while($row = mysqli_fetch_array($result4))
      {
   ?>
           <h4 value = "<?php echo $row['id'];?>">
            <?php
             echo'<h4>Full Name: </h4>';echo $row['firstname'];echo ' ';  echo $row['lastname']; echo '<br>'; 
             echo'<h4>Social Number: </h4>'; echo $row['socialnumber']; echo '<br>'; 
             echo'<h4>Email: </h4>'; echo $row['email']; echo '<br>'; 
             echo'<h4>Password:</h4> '; echo $row['password']; echo '<br>'; 
             echo'<h4>Username: </h4>'; echo $row['username']; echo '<br>'; 
             echo'<h4>Date Of Birth: </h4>'; echo $row['dob']; echo '<br>'; 
             echo'<h4>Address: </h4>';
             $addressID=$row['addressid'];
             while($addressID != 0)
             {
             $sql5 = "SELECT * FROM address WHERE id='$addressID'";
             $result5 = mysqli_query($conn, $sql5);
             while($row2 = mysqli_fetch_array($result5))
             {
                 echo " ".$row2['name']." ";
                 $addressID = $row2['pid'];
             }
             }        
           ?> </h4>  
  <?php 
  }
  ?>
  <?php
  }


}
static function adduser ($obj)
{   
        $DB=database::getinstance();
        if($_POST['password'] = $_POST['password2']){
            $sql7 = "SELECT id FROM `address` WHERE name='$obj->City'";
            $result7 = $DB->query("address", "name='$obj->City'");
            while ($x = mysqli_fetch_array($result7))
             {
            $CIDs= $x[0];
            }        
            $sql = $DB->insertquery("user", " firstname,lastname,username,email,Password,
            usertypeid,addressid,socialnumber,dob,isdeleted" , "'$obj->firstname','$obj->lastname','$obj->username','$obj->email','$obj->password','2','$CIDs','$obj->socialnumber','$obj->dob','false'");

                       header("Location:index.php");
        }
        else 
            {
              echo "<script>alert('Passwords written are not the same')</script>"; 
              header("Location:index.php");
            }
          }

static function deleteuser ()
{
        $DB=database::getinstance();
    session_start();
    if(!empty($_SESSION))
    {
        $result= $DB->updatequery("user","isdeleted" , "'true'" , "id = '".$_SESSION["ID"]."'");
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
        $DB=database::getinstance();
        session_start();
        $linkNameArray=array();
        $linkPhysicalArray=array();
        if(isset($_POST['signin_submit']))
        { 

   //         $sql = "select * from user where
     //        username = '$username' and 
       //      password = '$password' and `isdeleted`= 'false'";
          $result = $DB->query("user", "username = '$username' and 
             password = '$password' and isdeleted= 'false'");

            if($row = mysqli_fetch_array($result))
            {
                  $typeId = $row["usertypeid"];
                $_SESSION["FirstName"] = $row["firstname"];
                $_SESSION["LastName"] = $row["lastname"];
                $_SESSION["Email"] = $row["email"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["Password"] = $row["password"];
                $_SESSION["ID"] = $row["id"];
                $result2 = $DB->query("usertypelinks", "typeId = $typeId");
             while($row2 = mysqli_fetch_array($result2))
                {
                    $linkId = $row2["linkid"];
                    $sql3="SELECT * FROM `links` WHERE id = $linkId";
                    $result3 = $DB->query("links", "id = $linkId");
                    while($row3 = mysqli_fetch_array($result3))
                    {
                        // $_SESSION['link']
                          array_push($linkPhysicalArray,$row3["physicallink"]);
                          array_push($linkNameArray,$row3["linkname"]);
                       // $_SESSION['pagename'] ;
                       $_SESSION['link']=$linkPhysicalArray;
                       $_SESSION['pagename']=$linkNameArray;
                    }
                }
                echo $_SESSION["link"];
                header("Location:index.php");
            }
            else
            {
                header("Location:signin.php");
                // echo "<script>alert('Invalid username or password')</script>";
            }
        
    }
    }
static function logout()
    {
         $DB=database::getinstance();
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


    }
}
?>