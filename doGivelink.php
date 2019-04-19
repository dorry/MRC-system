<?php
//malhash lazma bardo
//Edited to Object Oriented
include"usertype.php";
include"links.php"; 
$R = $_POST['role'];
$L = $_POST['link'];
$usertype = new usertype();
$links = new links();

$usertype->id = $R;
$links->id= $L;
$links->addlink($links,$usertype);

?>