<?php
include "useroptions.php";
session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}
	$R = $_POST['name'];
	$D = $_POST['datatype'];
	$useroptions = new useroptions();
	$useroptions->name = $R;
	$useroptions->type = $D;
	$useroptions->adduseroptions($useroptions);


?>