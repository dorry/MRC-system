<?php
require_once"mydatabaseconnection.php";

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


static function retriveforlinks(){

    $DB=new database();
    $conn=$DB->DBC();
    
    echo"<label>Users</label>";
    echo" <select name='user'>";
    $query = "SELECT  *  FROM `user` WHERE isdeleted='false'";
    $result = mysqli_query($conn, $query);
    echo"<label >Users</label>";
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
       {
    ?>
            <option value = "<?php echo $row['id'];?>"><?php echo $row['firstname']; echo " "; 
            echo $row['lastname'];?>
            </option>
      <?php 
        }
        echo "</select>";
        echo "<br>";

   ?>
   
   <?php
   }



}
static function retrivedoctorsforeditres()
{
    $DB=new database();
    $conn=$DB->DBC();
    echo "<select name = 'doc'>";
    $sql4 = "SELECT  *  FROM `user` WHERE isdeleted='false' 
    and usertypeid = (select id from usertype where type = 'doctor')";
    $result4 = mysqli_query($conn, $sql4);
    echo $sql4;
    if(mysqli_num_rows($result4) > 0){
       while($row = mysqli_fetch_array($result4))
      {
   ?>

  <option value="<?php echo $row['id'];?>">
   Dr. 
  <?php echo $row['lastname']; ?>
  </option>
  <?php 
  }
  echo"</select>";
  ?>
  
  <?php
  }




}

static function retrive(){
    $DB=new database();
    $conn=$DB->DBC();
    $sql4 = "SELECT  *  FROM `user` WHERE isdeleted='false'";
    $result4 = mysqli_query($conn, $sql4);
    if(mysqli_num_rows($result4) > 0){
       while($row = mysqli_fetch_array($result4))
      {
   ?>
  
           <h4 value = "<?php echo $row['id'];?>"> <?php echo $row['id'];  echo '     ';  echo $row['firstname'];
  echo '     ';  echo $row['lastname']; echo '     ';  echo $row['socialnumber'];
           ?> </h4>  
  <?php 
  }
  ?>
  
  <?php
  }


}

static function RetrieveProfileForUser(){
    $DB=new database();
    $conn=$DB->DBC();
    $sql4 = "SELECT  *  FROM `user` WHERE id=".$_SESSION['ID']." and isdeleted='false'";
    $result4 = mysqli_query($conn, $sql4);
    if(mysqli_num_rows($result4) > 0){
       while($row = mysqli_fetch_array($result4))
      {
   ?>
  
           <h4 value = "<?php echo $row['id'];?>"> <?php echo'<h4>Full Name: </h4>';echo $row['firstname'];echo ' ';  echo $row['lastname']; echo '<br>'; 
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
{//ya sherif
    
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
        
            $sql = "Insert INTO user (firstname,lastname,username,email,Password,usertypeid,addressid,socialnumber,dob,isdeleted)  	
             values('$obj->firstname','$obj->lastname','$obj->username','$obj->email','$obj->password','2','$CIDs','$obj->socialnumber','$obj->dob','false')" ;
            mysqli_query($conn,$sql);
                   header("Location:index.php");
        
        
        }
        else{
        
        echo "<script>alert('Passwords written are not the same')</script>";
                   header("Location:index.php");
        
        }
        
        
        
        
        }

}


static function edituser ()
{
    $DB=new database();
    $conn=$DB->DBC();
    if(isset($_POST['edit'])){ 
        $sql = "update user set firstname = '" . $_POST["FName"] . 
        "' , lastname ='" . $_POST["LName"] .  
        "' , email ='" . $_POST["Email"] . 
        "' , socialnumber ='" . $_POST["socialnumber"] . 
        "' , password ='" . $_POST["Password"] . 
        "' , dob ='" . $_POST["dob"] .  
        "' , username ='" . $_POST["username"] . "' WHERE id ='".$_SESSION['ID']."'";
        $result = mysqli_query($conn, $sql);
    
        if($result){
            $_SESSION["FirstName"] = $_POST["FName"];
            $_SESSION["LastName"] = $_POST["LName"];
            $_SESSION["Email"] = $_POST["Email"];
            $_SESSION["Password"] = $_POST["Password"];
            $_SESSION["username"] = $_POST["username"];
            // header("Location:index.php");
        }else{
            return $sql;
        }
    }
    $sqlToGetExtraInfo="select * from user where id ='".$_SESSION['ID']."'";
    $result=mysqli_query($conn , $sqlToGetExtraInfo);
    if($row = mysqli_fetch_array($result)){
    echo "
    <form action='' method='post'>
         FirstName:
        <input type='text' value='".$_SESSION['FirstName']."' name='FName'><br>
         LastName:
        <input type='text' value='".$_SESSION['LastName']."' name='LName'><br>
         Email: 
        <input type='text' value='".$_SESSION['Email']."' name='Email'><br>
        Password: 
        <input type='text' value='".$_SESSION['Password']."' name='Password'><br>
        Social Security Number: 
        <input type='text' value='".$row['socialnumber']."' name='socialnumber'><br>
        Date of birth:
        <input type='text' value='".$row['dob']."' name='dob'><br>
        username: 
        <input type='text' value='".$_SESSION['username']."' name='username'><br> 
        <input type='submit' value='edit' name='edit' class='template-btn mt-3'><br> 
        </form> ";
    }

}

static function deleteuser ()
{
    $DB=new database();
        $conn=$DB->DBC();
    session_start();
    if(!empty($_SESSION))
    {
        $query = " UPDATE `user` SET `isdeleted` = 'true' WHERE `user`.`id` = '".$_SESSION["ID"]."'";
       

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
        $linkNameArray=array();
        $linkPhysicalArray=array();
        if(isset($_POST['signin_submit']))
        { 

            $sql = "select * from user where
             username = '$username' and 
             password = '$password' and `isdeleted`= 'false'";
             $result = mysqli_query($conn, $sql);
        
            if($row = mysqli_fetch_array($result))
            {
                  $typeId = $row["usertypeid"];
                $_SESSION["FirstName"] = $row["firstname"];
                $_SESSION["LastName"] = $row["lastname"];
                $_SESSION["Email"] = $row["email"];
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
                header("Location:signin.html");
                // echo "<script>alert('Invalid username or password')</script>";
            }
        
    }
    }
static function logout()
    {
        $DB=new database();
        $conn=$DB->DBC();
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