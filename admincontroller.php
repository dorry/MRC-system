<?php 

require_once 'user.php';
require_once 'userview.php';
require_once 'admin.php';
require_once 'adminview.php';
require_once 'usertype.php';
require_once 'useroptions.php';
require_once 'links.php';

//USER OPTION MANAGER and EAV


class admincontroller{
 static function showmyres($lid)
 {
    $view = new adminview();
    $view->showformyres($lid);
  }
  static  function viewradiologydropdown()
  {
        $view = new adminview();
        $view->showradiologydropdown();
  }
  static  function vieweditradform()
  {
        $view = new adminview();
        $view->showeditradiologyform();
  }
 static  function viewcreateradform()
  {
        $view = new adminview();
        $view->showcreateradiologyform();
  }
static  function viewradiologytable()
  {
        $view = new adminview();
        $view->showradiology();
  }

static function viewuserdropdown()
  {
    $view = new adminview();
    $view->showuserdropdown();
  }

static function viewdropdowneav($rid)
  {
    $view = new adminview();
    $view->showuserdropdowneav($rid);
  }
static function viewoptionseav($rid){
    $view = new adminview();
    $view->showoptionsforeav($rid);
  }


static function viewediteavtypeform(){
    $view = new adminview();
    $view->showediteavtypeform();
}
static function viewtypedropdowneav(){
    $view = new adminview();
    $view->showusertypedropdowneav();
  }
static function vieweavtypeform(){
    $view = new adminview();
    $view->showeavtypeform();
}
static function viewgiveoptionform(){
    $view = new adminview();
    $view->showgiveform();
}
static function vieweditoptionform(){
    $view = new adminview();
    $view->showeditoptionform();
}

  static function viewoptiondropdown(){
    $view = new adminview();
    $view->showoptiondropdown();
  }
static function viewdeleteoptionform(){
    $view = new adminview();
    $view->showdeleteoptionform();
}

  static function viewcreateoptionform()
  {
    $view = new adminview();
    $view->showcreateoptionform();
   }
  static  function ShowLinksdropdown()
  {
    $view = new adminview();
    $view->ShowLinksdropdown();
  }
static  function CreateLinkForm()
  {
    $view = new adminview();
    $view->CreateLinkForm();
  }
static function showdeletetype(){
    $view = new adminview();
    $view->deletetypeform();
}

static function showedittype(){
    $view = new adminview();
    $view->edittypeform();
}

static function showcreatetype(){
    $view = new adminview();
    $view->createtypeform();
}

static function viewtypes(){
    $view = new adminview();
    $view->showusertypes();
}

  static function viewUTdropdown()
  {
    $view = new adminview();
    $view->showusertypedropdown();
  }
  static  function showedituser()
  {
    $view = new adminview();
    $view->showedituserform();
  }

  static function view()
  {
    $view = new adminview();
    $view->showuser();
  }
  static function DoctorDropdown()
  {
    $view = new adminview();
    $view->ShowDoctorNamesdropdown();
  }
  static function showDP()
  {
    $view = new adminview();
    $view->showdrpatient();
  }

  static function showDropdown()
  {
    $view = new adminview();
    $view-> showdrpatientdropdown();
  }
}

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
  $sql5 = "SELECT  * FROM `usertypeoptions` where userTypeId = $R";
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

if(isset($_POST['CreateAuthorize']))
{
  $L = $_POST['link'];
  $P = $_POST['plink'];
  $links = new links();
  $admin = new admin();
  $links->linkname =$L;
  $links->physicallink =$P;
  $admin->createlink($links);
  header("Location:linkCRUD.php");
}
if(isset($_POST['Glink_submit']))
{
  $R = $_POST['role'];
  $L = $_POST['link'];
  $usertype = new usertype();
  $links = new links();
  $admin = new admin();
  $usertype->id = $R;
  $links->id= $L;
  $admin->addlink($links,$usertype);
  header("Location:linkCRUD.php");
}
if(isset($_POST['link_submit']))
{
  $R = $_POST['role'];
  $L = $_POST['link'];
  $usertype = new usertype();
  $links = new links();
  $admin = new admin();
  $usertype->id = $R;
  $links->id= $L;
  $admin->editlink($links,$usertype);
  header("Location:linkCRUD.php");
}

if(isset($_POST['DeleteLink']))
{
  $L = $_POST['link'];
$links = new links();
$admin = new admin();
$links->id= $L;
$admin->deletelink($links);
header("Location:linkCRUD.php");
}

if(isset($_POST['AdminEditReservation']))
{//lesa
  $Date = $_POST['date'];
  $dr = $_POST['doc'];
  $radid = $_POST['rad'];
  $Resid = $_POST['reserve'];
  $resd = new reservationdetails();
  $res = new reserve();
  $admin = new admin();
  $res->doctorid=$dr;
  $res->date = $Date;
  $resd->id = $Resid;
  $resd->radiologyid = $radid;
  $admin->editreserve($res,$resd);
  header("Location:ReservationCRUD.php");
}
?>