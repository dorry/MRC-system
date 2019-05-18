<?php
session_start();
if (!isset($_SESSION)) { header("Location:index.php"); }if (empty($_SESSION)) { header("Location:index.php"); }require_once "admincontroller.php";
$admin = new admincontroller();
$admin->showuserCRUD();
?>