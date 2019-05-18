<?php 

require_once 'user.php';
require_once 'userview.php';
require_once 'admin.php';
require_once 'adminview.php';
require_once 'usertype.php';
require_once 'useroptions.php';
require_once 'links.php';
require_once 'doctor.php';
require_once 'session.php';
//USER OPTION MANAGER and EAV


class admincontroller{
 

 static  function showeditschform()
  {
        $view = new adminview();
        $view->editschform();
  }
 static  function showadminpanel()
  {
        $view = new adminview();
        $view->adminpanel();
  }
    static  function showdoctorsch()
  {
        $view = new adminview();
        $view->doctorsch();
  }
  
  static  function showuserCRUD()
  {
        $view = new adminview();
        $view->userCRUD();
  }
  static  function showdrCRUD()
  {
        $view = new adminview();
        $view->drCRUD();
  }  
  static  function showroleCRUD()
  {
        $view = new adminview();
        $view->roleCRUD();
  }
  static  function showradCRUD()
  {
        $view = new adminview();
        $view->radCRUD();
  } 
  static  function showresCRUD()
  {
        $view = new adminview();
        $view->resCRUD();
  }    
  static  function showUTD()
  {
        $view = new adminview();
        $view->UTD();
  }  
  static  function showlinkCRUD()
  {
        $view = new adminview();
        $view->linkCRUD();
  }    
 static function showmyres($lid)
 {
    $view = new adminview();
    $model = new doctor(); 
    $model->setview($lid);
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
  static function showcreatedrsch()
  {
    $view = new adminview();
    $view->createdrsch();
  }
    static function showcreatedrsch2()
  {
    $view = new adminview();
    $view->createdrsch2();
  }
  static function DoctorDropdown()
  {
    $view = new adminview();
    $view->ShowDoctorNamesdropdown();
  }
  static function showDP()
  {
    $view = new adminview();
    $model = new admin(); 
    $model->setview(2);
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
   $DB=database::getinstance();
   $R = $_POST['roleid'];
   $U =  $_POST['user'];
   $result5 = $DB->query("usertypeoptions", "usertypeid= '$R' and isdeleted='false'");
      $oname = array();
      $usertypeoptions = array();
        while($row = mysqli_fetch_array($result5))
      {
      $OID = $row['optionsId'];
      $result6 = $DB->query("useroptions", "id= '$OID' and isdeleted='false'");
      while($rowUsOp = mysqli_fetch_array($result6))
          {
          
             array_push($oname, $rowUsOp['name']);
          }
       }
  //echo $get_uto_id;
  $result_uto = $DB->idquery("usertypeoptions", "userTypeId ='$R' and isdeleted='false'");      

  $sql10 = "SELECT * from useropvalue where userId = $U";
  $result10 = $DB->query("useropvalue", "userId = '$U' and isdeleted='false'");      
  // secho $sql10;
    while($row55= mysqli_fetch_array($result10))
  {
   array_push($usertypeoptions, $row55['userTyOpId']);
  }
        while($row = mysqli_fetch_array($result_uto))
      {
        $o = $_POST[$oname[$i]];
        $U = $usertypeoptions[$i];
   //    $insert_values = "UPDATE useropvalue
 //       SET value='".$_POST[$oname[$i]]."' 
     //   WHERE userTyOpId = ".$usertypeoptions[$i]." " ;
            $insert_values = $DB->updatequery("useropvalue", "value" , "'$o'", "userTyOpId ='$U'" );
              $i++;
    }
      header("Location:UTD.php");
       
 }

if(isset($_POST['utd_submit'])){
     $DB=database::getinstance();
      $R = $_POST['roleid'];
      $result5 = $DB->query("usertypeoptions", "usertypeid= '$R' and isdeleted='false'");
      $oname = array();
        while($row = mysqli_fetch_array($result5))
      {
        $OID = $row['optionsId'];
        $result6 = $DB->query("useroptions", "id= '$OID' and isdeleted='false'");
             while($rowUsOp = mysqli_fetch_array($result6))
          {
             array_push($oname, $rowUsOp['name']);
                      
                   }
                }
    $result_uto = $DB->idquery("usertypeoptions", "userTypeId ='$R' and isdeleted='false'");      
        while($row = mysqli_fetch_array($result_uto))
      {
        $nid = $row['id'];
        $nu = $_POST['user'];
        $o = $_POST[$oname[$i]];
            echo $insert_values;
     //   mysqli_query($conn , $insert_values);
    $insert_values = $DB->insertquery("useropvalue", "userTyOpId , userId , value" , "'$nid', '$nu','$o'");     
      $i++;
      
    }
    header("Location:UTD.php");
  
}


if(isset($_POST['EditSchedule']))
{
  $DB=database::getinstance();
  $id=$_POST['ScheduleID'];
  $result = $DB->query("schedule", "id= '$id' and isdeleted='false'");
  echo "<h1>". $id . "</h1>"; 

  if($row = mysqli_fetch_array($result))
  {
    $st=$row['StartTime'];
    $et=$row['EndTime'];
    $schedule = new schedule();
    $admin = new admin();
    $schedule->id=$id;
    $schedule->starttime =$st;
    $schedule->endtime = $et;
    $_SESSION['schedule']= serialize($schedule);
    echo'<script>alert("Selected Succesfully redirecting")</script>';
    header("refresh:1; url=editschedule.php");
}
echo "</form>";
}

if(isset($_POST['doeditschedule']))
{
$schedule = new schedule();
$admin = new admin();
$schedule->id = $_POST['id'];
$schedule->starttime = $_POST['ST'];
$schedule->endtime=$_POST['ET'];
$admin->editdrsch($schedule);
}

if(isset($_POST['createdrsch']))
{
$schedule = new schedule();
$admin = new admin();
$schedule->docid = $_POST['doc'];
$schedule->starttime = $_POST['ST'];
$schedule->endtime=$_POST['ET'];
$admin->createdrsch($schedule);
}

if(isset($_POST['EditProfile'])){

  $DB=database::getinstance();
  $id=$_POST['id'];
  $result = $DB->query("user", "id= '$id' and isdeleted='false'");

  if($row = mysqli_fetch_array($result))
  {
    $_SESSION['editusername'] = $row['username'];
    $_SESSION['editemail'] = $row['email'];
    $username=$row['username'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $SSN=$row['socialnumber'];
    $Email=$row['email'];
    $DOB=$row['dob'];
    $user = new user();
    $user->id=$id;
    $user->username =$username;
    $user->email= $Email;
    $user->firstname= $firstname;
    $user->lastname=  $lastname;
    $user->socialnumber=$SSN;
    $user->dob=$DOB;
    $_SESSION['user']= serialize($user);
    echo'<script>alert("Selected Succesfully redirecting")</script>';
    header("refresh:1; url=edituser.php");

  }
      // 

?>
</form>
<?php

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
$user->firstname=$_POST['firstname'];
$user->lastname=$_POST['lastname'];
$user->socialnumber=$_POST['ssn'];
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
  //header("Location:radiologyCRUD.php");
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
  //header("Location:index.php");
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
  //header("Location:linkCRUD.php");
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
{
  $Date = $_POST['date']." ".$_POST['time'].":00";
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
if(isset($_POST['DeleteReservation']))
{
 
  $Resid = $_POST['ReserveID'];
  $resd = new reservationdetails();
  $admin = new admin();
  $resd->id = $Resid;
  $admin->deletereserve ($resd);
  header("Location:index.php");
}

?>