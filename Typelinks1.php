<?php //malhash lazmaa
session_start();

include"usertype.php";
include"links.php"; 
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}

$R = $_POST['role'];
$L = $_POST['link'];
$usertype = new usertype();
$links = new links();

$usertype->id = $R;
$links->id= $L;
$links->editlink($links,$usertype);



?>