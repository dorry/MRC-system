<?php 
include"mydatabaseconnection.php";
include"links.php"; 

$L = $_POST['link'];
$P = $_POST['plink'];
$links = new links();
$links->linkname =$L;
$links->physicallink =$P;
$links->createlink($links);



?>