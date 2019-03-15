<?php 
include"user.php";
include"IReserve.php";
include"IRegister.php";
require_once"mydatabaseconnection.php";
class admin extends user implements Ilogin,IReserve,IRegisterh{

    public  function register($firstName,$lastName,$email,$password,$dob,$telephone,$gender,$username,$department,$WorkingDaysHours){}
   
   
        public  function register2($firstName,$lastName,$email,$password,$dob,$telephone,$gender,$username){}
        
        
        public  function makeReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){}
        public  function editReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){}
        public  function showReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 
        public  function deleteReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad){} 

    static function login($name,$password){


    
    }

static function manipluateURL($URL){



}

static function deletepatient($patient){



}
static function retrivepatient($patient){


}

static function updatepatient($patient){


}

static function deletereceptionist($receptionist){



}

static function updatereceptionist($receptionist){



}

static function retrivereceptionist($receptionist){



}

static function showdoctor($doctor){



}

static function updatedoctor($doctor){



}
static function deletedoctor($doctor){



}

static function createdoctor($doctor){



}

static function createreceptionist($receptionist){



}

static function createradiology($name , $price){


}

static function deleteradiology($id){


}

static function editradiology($id,$name,$price){


}


}

?>