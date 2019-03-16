<?php
//Edited to Object Oriented
include"usertype.php";
include"useroptions.php";

session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}

	$R = $_POST['role'];
	$O = $_POST['option'];
	$UT= new usertype();
	$UT->id = $R;
	$Options = new useroptions();
	$Options->id =$O;
	$Options->giveoption($Options, $UT);


?>