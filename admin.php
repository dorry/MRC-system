<?php 
require_once"user.php";
require_once"IReserve.php";
require_once"IRegister.php";
require_once"mydatabaseconnection.php";


class admin extends user{


public  function editReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){}
public  function showReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 
public  function deleteReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 




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



}
?>