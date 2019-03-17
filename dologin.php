<?php
include"user.php";
$username=$_POST['username'];
$password=$_POST['password'];
$encrpassword = sha1($password);


$user= new user();
$user->login($username,$encrpassword);

?>
