<?php 

require_once 'user.php';
require_once 'userview.php';
require_once 'admin.php';
require_once 'usertype.php';
require_once 'useroptions.php';

//USER OPTION MANAGER and EAV

$i = 0;


if(isset($_POST['eutd_submit'])){
$DB=new database();
$conn=$DB->DBC();
  $R = $_POST['roleid'];
  $U =  $_POST['user'];

  $sql5 = "SELECT  * FROM `usertypeoptions` where userTypeId=$R" ;
  $result5 = mysqli_query($conn, $sql5);
    if(mysqli_num_rows($result5) > 0){
      $oname = array();
      $usertypeoptions = array();
        while($row = mysqli_fetch_array($result5))
      {
        $OID = $row['optionsId'];
      $sql6 = "SELECT  * FROM `useroptions` where id= '$OID';";
      $result6 = mysqli_query($conn, $sql6);
         if(mysqli_num_rows($result6) > 0){
             while($rowUsOp = mysqli_fetch_array($result6))
          {
          
             array_push($oname, $rowUsOp['name']);
                      
                   }
                }
            }
        }
  $get_uto_id = "select id from usertypeoptions where userTypeId =$R" ;
  //echo $get_uto_id;
  $result_uto = mysqli_query($conn, $get_uto_id);
  $sql10 = "SELECT userTyOpId from useropvalue where userId = $U";
  $result10 =mysqli_query($conn,$sql10);
  // secho $sql10;
  if(mysqli_num_rows($result10) > 0){
    while($row55= mysqli_fetch_array($result10))
 {
    
   array_push($usertypeoptions, $row55['userTyOpId']);
            
         }
      }
    if(mysqli_num_rows($result_uto) > 0){
      
        while($row = mysqli_fetch_array($result_uto))
      {
       $insert_values = "UPDATE useropvalue
        SET value='".$_POST[$oname[$i]]."' 
        WHERE userTyOpId = ".$usertypeoptions[$i]." " ;
            echo $insert_values;
             mysqli_query($conn , $insert_values);
             $i++;
    }
      header("Location:UTD.php");
   }
     
 }

if(isset($_POST['utd_submit'])){
  $DB=new database();
$conn=$DB->DBC();

  $R = $_POST['roleid'];
  $sql5 = "SELECT  * FROM `usertypeoptions` where userTypeId = $R" ;
  $result5 = mysqli_query($conn, $sql5);
    if(mysqli_num_rows($result5) > 0){
      $oname = array();
        while($row = mysqli_fetch_array($result5))
      {
        $OID = $row['optionsId'];
      $sql6 = "SELECT  * FROM `useroptions` where id= '$OID';";
      $result6 = mysqli_query($conn, $sql6);
      if(mysqli_num_rows($result6) > 0){
             while($rowUsOp = mysqli_fetch_array($result6))
          {
             array_push($oname, $rowUsOp['name']);
                      
                   }
                }
            }
        }
  $get_uto_id = "select id from usertypeoptions where userTypeId =$R" ;
  echo $get_uto_id;
    $result_uto = mysqli_query($conn, $get_uto_id);
    

    if(mysqli_num_rows($result_uto) > 0){
      
        while($row = mysqli_fetch_array($result_uto))
      {

       $insert_values = 
       "insert into useropvalue (userTyOpId , userId , value) 
       values (" . $row['id'] .",". $_POST['user']. ",'" . $_POST[$oname[$i]]."' )" ;
            echo $insert_values;
             mysqli_query($conn , $insert_values);
      $i++;
      
    }
    header("Location:UTD.php");
  }
}

if(isset($_POST['dogiveoption']))
{
  $R = $_POST['role'];
  $O = $_POST['option'];
  $UT= new usertype();
  $admin = new admin();
  $UT->id = $R;
  $Options = new useroptions();
  $Options->id =$O;
  $admin->giveoption($Options, $UT);
}

if(isset($_POST['doeditoption']))
{
  $UO = new useroptions();
  $admin = new admin();
  $UO->id = $_POST['option'];
  $UO->name = $_POST['new'];
  $admin->edituseroptions($UO);
}
if(isset($_POST['dodeleteoption']))
{
  $O = $_POST['option'];
  $Options = new useroptions();
  $Options->id= $O;
  $admin = new admin();
  $admin->deleteuseroptions($Options);
}
if(isset($_POST['docreateoption']))
{
  $R = $_POST['name'];
  $D = $_POST['datatype'];
  $useroptions = new useroptions();
  $admin = new admin();
  $useroptions->name = $R;
  $useroptions->type = $D;
  $admin->adduseroptions($useroptions);
}


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
?>