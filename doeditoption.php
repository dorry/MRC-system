<?php 
include"useroptions.php";

$UO = new useroptions();
$UO->id = $_POST['option'];
$UO->name = $_POST['new'];
$UO->edituseroptions($UO);



?>