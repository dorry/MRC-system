<?php
session_start();
if (empty($_SESSION)) { header("Location:index.php"); }
require_once "admincontroller.php";
$admin = new admincontroller();
$admin->showroleCRUD()
?>