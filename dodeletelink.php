<?php
//malhash lazma now
include"mydatabaseconnection.php";
//Edited to Object Oriented
include"links.php"; 
$L = $_POST['link'];
$links = new links();
$links->id= $L;
$links->deletelink($links);
	
?>