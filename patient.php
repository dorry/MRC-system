<?php 
include"user.php";
require_once"mydatabaseconnection.php";
class patient extends user implements Ilogin{

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

}

?>