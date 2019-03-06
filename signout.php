<?php
session_start();
if(!empty($_SESSION))
{
    header("Location:index.php");
}
else
{
  
}
session_unset();
header("Location:index.php");
?>