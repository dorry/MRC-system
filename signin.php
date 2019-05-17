<?php
require_once "SharedFacadeUserAndDoctor.php";
require_once "navbar.php";
$user= new SharedFacade();
$user->User->viewsignin();  
require_once "footer.php";

?>