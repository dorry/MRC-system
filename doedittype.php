<?php
include"usertype.php";
$Rid = $_POST['role'];
$name = $_POST['newname'];

$UT = new usertype();
$UT->id = $Rid;
$UT->type= $name;

$UT->editusertype($UT);


?>