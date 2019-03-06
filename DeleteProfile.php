<?php
session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}
$servername = "localhost";
$username = "id8878100_root";
$password = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$query = "Delete From user WHERE username = '".$_SESSION["username"]."'";
mysqli_query($conn, $query);
mysqli_close($conn);
session_unset();
header("Location: index.php");
?>