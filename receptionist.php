<?php 
include"user.php";
require_once"mydatabaseconnection.php";
include"Ilogin.php";
class receptionist extends user implements Ilogin{

public $department;

static function login($name,$password){


    
}

static function makereservation($doctor,$patient,$date,$rad){




}
static function editreservation($doctor,$patient,$date,$rad){




}

static function showreservation($doctor,$patient,$date,$rad){




}

static function deletereservation($doctor,$patient,$date,$rad){




}

}

?>