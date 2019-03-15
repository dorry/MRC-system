<?php 
include"user.php";
include"IReserve.php";
include"IRegister.php";
require_once"mydatabaseconnection.php";
class patient extends user implements IReserve,IRegister{

public $cart;


static function login($name,$password){


    
}

static function showreports(){



}
static function showschedule(){


}

static function makereservation($doctor , $patient , $date , $radiology){


    
}
static function editreservation($doctor , $patient , $date , $radiology){


    
}

static function deletereservation($doctor , $patient , $date , $radiology){


    
}

static function showreservation($doctor , $patient , $date , $radiology){


    
}

public  function makeReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){}
public  function editReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 
public  function showReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 
public  function deleteReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 

public  function register($firstName,$lastName,$email,$password,$dob,$telephone,$gender,$username,$department,$WorkingDaysHours){}
   
   
public  function register($firstName,$lastName,$email,$password,$dob,$telephone,$gender,$username){}
 
}

?>