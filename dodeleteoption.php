<?php
//Edited to Object Oriented
include("mydatabaseconnection.php");

include"useroptions.php"; 
$O = $_POST['option'];
$Options = new useroptions();
$Options->id= $O;
$Options->deleteuseroptions($Options);
	
?>