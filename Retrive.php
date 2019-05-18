<?php
session_start();
if (empty($_SESSION)) { header("Location:index.php"); }
  require_once("user.php");
  require_once("admincontroller.php");
  $c = new admincontroller();
  $c->view();
?>
