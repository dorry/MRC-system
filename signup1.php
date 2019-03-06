<?php
include"user.php";

$firstname = $_POST['FName'];
$lastname = $_POST['LName'];
$username = $_POST['UName'];
$email = $_POST['email'];
$password = $_POST['password'];
$Gender = $_POST['gender'];
$socialnumber = $_POST['SSN'];	
$dob = $_POST['DOB'];
$City = $_POST['City'];

$user= new user();
$user->email=$email;
$user->password=$password;
$user->firstname=$firstname;
$user->lastname=$lastname;
$user->username=$username;
$user->City=$City;
$user->dob=$dob;
$user->socialnumber=$socialnumber;

$user->adduser($user);

 ?>
