<?php
require_once "usercontroller.php";
require_once "doctorcontroller.php";
// require_once "session.php";

class SharedFacade
{
public $User;
public $Doctor;
function __construct() {
$this->User = new usercontroller();
$this->Doctor = new doctorcontroller();
}
}


?>