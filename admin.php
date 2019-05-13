<?php 
require_once"user.php";
require_once"IReserve.php";
require_once"IRegister.php";
require_once"mydatabaseconnection.php";
require_once 'reserve.php';
require_once 'reservationdetails.php';
require_once 'radiology.php';

class admin extends user{

public function update($array)
{

    if($_SESSION['UTID'] == 2)
    {
        $length = count($array);
        $counter = 0;
            for ($i = 0; $i < $length; $i++)
            {
                if($_SESSION['ID'] == $array[$i]['recieverID'] ){$counter++;}
            }

    if($counter != 0){echo "<li><b> $counter </b> </li>";}
    }
}

public function setview($lid)
{
    $DB=database::getinstance();  
    $result=$DB->updatequery("notifications","isviewed", "true" ,"uid = '$lid' AND reportid IS NULL");
}
public  function editReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){}
public  function showReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 
public  function deleteReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 

static function giveoption($obj,$obj1)
{
    $DB=database::getinstance();
    $result = $DB->insertquery("usertypeoptions", "optionsId,userTypeId" , "'$obj->id','$obj1->id'");
    header("Location:UTD.php");
}
static function edituseroptions ($obj)
{
    $DB=database::getinstance();
    $result = $DB->updatequery("useroptions", "name" , "'$obj->name'" , "id = '$obj->id'");
    header("Location:UTD.php");
}

static function deleteuseroptions ($obj)
{
    $DB=database::getinstance();
    $result = $DB->updatequery("useroptions", "isdeleted" , "'true'" , "id = '$obj->id'");
    $result = $DB->updatequery("usertypeoptions", "isdeleted" , "'true'" , "optionsId = '$obj->id'");
    header("Location:UTD.php");
}

static function adduseroptions ($obj)
{
    $DB=database::getinstance();
    $result = $DB->insertquery("useroptions", "name,type" , "'$obj->name','$obj->type'");
    header("Location:UTD.php");
}

static function deleteusertype ($obj)
{
    $DB=database::getinstance();
    $result = $DB->updatequery("usertype", "isdeleted" , "'true'" , "id = '$obj->id'");
    header("Location:Roles.php");
}


static function editusertype ($obj)
{
    $DB=database::getinstance();
    $result = $DB->updatequery("usertype", "type" , "'$obj->type'" , "id = '$obj->id'");
    header("Location:Roles.php");
}


static function addusertype($obj)
{
    $DB=database::getinstance();
    $result = $DB->insertquery("usertype", "type" , "'$obj->type'");
    header("Location:Roles.php");
}


static function admindeleteuser ($obj)
{
    $DB=database::getinstance();
    $result = $DB->updatequery("user", "isdeleted" , "'true'" ,"id='$obj->id'" );
        echo $sql;
}


static function adminedituser ($obj){
    $usernamevalidate =  $firstnamevalidate = 
    $lastnamevalidate = $emailvalidate = 
    $passwordvalidate = $gendervalidate = $dobvalidate = 
    $socialnumbervalidate = $cityvalidate = "";

    if(!preg_match("/^[0-9a-zA-Z_]{5,}$/", $obj->username))
    {
      $usernamevalidate = "User must be bigger that 5 chars and contain only digits, letters and underscore";
      header("Location:signup.php");
    }
    else if(!filter_var($obj->email, FILTER_VALIDATE_EMAIL))
    {
      $emailvalidate = "Invalid email format.";
      header("Location:edituser.php");
    }
    else if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $obj->password))
    {
      //$passwordvalidate = 
      echo "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit";
      header("Location:edituser.php");
    }
    else
    {
    $DB=database::getinstance();
        $result = $DB->update4query("user", 
        "email" ,"password", "username" , "usertypeid"
        ,"'$obj->email'" , "'$obj->password'" , "'$obj->username'" , "'$obj->usertypeid'" ,
         "id='$obj->id'" );
       header("Location:userCRUD.php");
    }

}
static function addradiology ($obj)
{
    $radpricevalidate;
    if($obj->price < 0)
    {
      $socialnumbervalidate = "Price cannot be negative values.";
      header("Location:createrad.php");
    }
    else
    {
        $DB=database::getinstance();
        $result = $DB->insertquery("radiology", "Name,price" , "'$obj->name' ,'$obj->price'" );
        header("Location:radiologyCRUD.php");
    }
}


static function editradiology ($obj)
{
    if($obj->price < 0)
    {
      $socialnumbervalidate = "Price cannot be negative values.";
      header("Location:editrad.php");
    }
    else
    {
        $DB=database::getinstance();
        $result = $DB->update2query("radiology", "Name" , "price" , "'$obj->name'" , "'$obj->price'" ,
                                "ID = '$obj->id'"); 
          header("Location:radiologyCRUD.php");
    }
}

static function deleteradiology ($obj)
{
    $DB=database::getinstance();
    $result = $DB->updatequery("radiology", "isdeleted" , "'true'" , "id = '$obj->id'");   
    header("Location:radiologyCRUD.php");
}

static function addlink ($obj,$obj1)
{

    $DB=database::getinstance();
    $result = $DB->insertquery("usertypelinks", "typeid,linkid" , "'$obj1->id','$obj->id'" );
    header("Location:linkCRUD.php");

}

static function createlink ($obj)
{
    $DB=database::getinstance();
    $result = $DB->insertquery("links", "linkname,physicallink" , "'$obj->linkname','$obj->physicallink'" );
    header("Location:linkCRUD.php");
}


static function editlink ($obj,$obj1)
{
    $DB=database::getinstance();
    $result = $DB->updatequery("usertypelinks", "linkid" , "'$obj->id'" , "typeid = '$obj1->id'");
    header("Location:index.php");



}

static function deletelink ($obj)
{
    $DB=database::getinstance();
    $result = $DB->updatequery("links", "isdeleted" , "'true'" , "id = '$obj->id'");
    header("Location:index.php");
}
public static function editreserve ($obj,$obj1)
  {
    $DB=database::getinstance();
    $result = $DB->updatequery("reservationdetails", "RadiologyID" , "'$obj1->radiologyid'" 
        , "ReserveID='$obj1->id'");
    $result1 = $DB->update2query("reserve", "DoctorID" , "Date" , "'$obj->doctorid'" , "'$obj->date'" 
        , "ID = '$obj1->id' ");
     header("Location:ReservationCRUD.php");
  }
  public static function deletereserve ($obj1)
  {
    $DB=database::getinstance();
    $result = $DB->updatequery("reservationdetails", "isdeleted" , "'true'" , "ReserveID='$obj1->id'");
    $result = $DB->updatequery("reserve", "isdeleted" , "'true'" , "ID  = '$obj1->id'");
    // header("Location:ReservationCRUD.php");
  }
}
?>