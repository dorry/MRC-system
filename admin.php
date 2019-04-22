<?php 
require_once"user.php";
require_once"IReserve.php";
require_once"IRegister.php";
require_once"mydatabaseconnection.php";
require_once 'reserve.php';
require_once 'reservationdetails.php';
require_once 'radiology.php';

class admin extends user{


public  function editReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){}
public  function showReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 
public  function deleteReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 

/*
static function insertoptiontypeeav($obj,$obj1,$obj2)
{
    $DB=new database();
    $conn=$DB->DBC();
    $insert_values = "insert into useropvalue (userTyOpId , userId , value) 
                      values ('$obj->id', '$obj1->user','" . $_POST[$oname[$i]]."' )" ;
             mysqli_query($conn , $insert_values);
           header("Location:UTD.php");

}
*/



static function giveoption($obj,$obj1)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "Insert INTO usertypeoptions (optionsId,userTypeId) values('$obj->id','$obj1->id')";
    mysqli_query($conn,$sql);
           header("Location:UTD.php");

}


static function edituseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "UPDATE `useroptions` SET `name` = '$obj->name' WHERE id = '$obj->id'";
    mysqli_query($conn,$sql);
    header("Location:UTD.php");
}

static function deleteuseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql="UPDATE `useroptions` SET isdeleted = 'true'
    WHERE id = $obj->id";
    mysqli_query($conn,$sql);
    header("Location:UTD.php");

}

static function adduseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "Insert INTO useroptions (name,type) values('$obj->name','$obj->type')";
    mysqli_query($conn,$sql);
    header("Location:UTD.php");
    echo "<script>alert('A New Option  has been created')</script>";
}

static function deleteusertype ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = " UPDATE `usertype` SET `isdeleted` = 'true' WHERE `id` = '".$obj->id."'";
    $result = mysqli_query($conn, $sql);     
}


static function editusertype ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql="UPDATE usertype
          SET type= '$obj->type'
          WHERE id = $obj->id;";
    mysqli_query($conn,$sql);
    header("Location:Roles.php");
}


static function addusertype($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "Insert INTO usertype (type) values('$obj->type')";
    mysqli_query($conn,$sql);
    header("Location:Roles.php");
}


static function admindeleteuser ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = " UPDATE `user` SET `isdeleted` = 'true' WHERE `user`.`id` = '".$obj->id."'";
    $result = mysqli_query($conn, $sql); 
    echo $sql;
}


static function adminedituser ($obj){
    $DB=new database();
    $conn=$DB->DBC();

    $sql = "update user set email ='" . $obj->email . 
        "' , password ='" . $obj->password . 
        "' , username ='" . $obj->username .
         "' , usertypeid='". $obj->usertypeid."'
        WHERE id ='".$obj->id."'";
        $result = mysqli_query($conn, $sql); 
        header("Location:userCRUD.php");

}
static function addradiology ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "Insert INTO radiology (Name,price) values('$obj->name' ,'$obj->price')";
    mysqli_query($conn,$sql);
    echo "<script>alert('A New role  has been created')</script>";
    header("Location:radiologyCRUD.php");

}


static function editradiology ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "UPDATE radiology SET Name= '$obj->name' ,  price = '$obj->price' WHERE ID='$obj->id'";
    mysqli_query($conn,$sql);
    header("Location:radiologyCRUD.php");

}

static function deleteradiology ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $DB=new database();
    $conn=$DB->DBC();
    $sql="UPDATE radiology SET isdeleted='true'
    WHERE ID = $obj->id";
    mysqli_query($conn,$sql);   
    header("Location:radiologyCRUD.php");
}

static function addlink ($obj,$obj1)
{
    $DB=new database();
    $conn=$DB->DBC();
	$sql = "Insert INTO usertypelinks (typeid,linkid) values('$obj1->id', '$obj->id')";
    mysqli_query($conn,$sql);
    header("Location:Roles.php");

}

static function createlink ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
	$sql = "Insert INTO links (linkname,physicallink) values('$obj->linkname','$obj->physicallink')";
    mysqli_query($conn,$sql);
    echo $sql;
    header("Location:linkCRUD.php");

}


static function editlink ($obj,$obj1)
{
    $DB=new database();
    $conn=$DB->DBC();

	$sql="UPDATE usertypelinks
		  SET linkid = $obj->id
		  WHERE typeid = $obj1->id;";
    mysqli_query($conn,$sql);
    header("Location:index.php");



}

static function deletelink ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql="UPDATE links SET isdeleted='true'
    WHERE id = $obj->id";
mysqli_query($conn,$sql);
header("Location:index.php");


}
public static function editreserve ($obj,$obj1)
  {
    $DB=new database();
    $conn=$DB->DBC();
    $sql1 = "UPDATE reservationdetails 
            SET RadiologyID='$obj1->radiologyid'
            WHERE ReserveID='$obj1->id'";

    $sql= "UPDATE reserve
          SET DoctorID = '$obj->doctorid' , Date = '$obj->date' 
          WHERE ID  = '$obj1->id' ";

    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    // header("Location:ReservationCRUD.php");
  }
}
?>