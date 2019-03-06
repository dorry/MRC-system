<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "mrc";
 $conn = mysqli_connect($servername,$username,$password,$dbname);

//if we turned this to object oriented, will it work with ajax ? 
$Cs = array();
$sql3 = "SELECT  name  FROM `address` where pid = 0";
$result3 = mysqli_query($conn, $sql3);
while ($x = mysqli_fetch_array($result3)) {
    global $Cs;
array_push($Cs, $x[0]);

}

$e= $_REQUEST["e"];


if($e !== "")
{
$CIDs = array();
$sql4 = "SELECT  id  FROM `address` where name = '$e'";
$result4 = mysqli_query($conn, $sql4);
while ($x = mysqli_fetch_array($result4))
{
    global $CIDs;
    array_push($CIDs, $x[0]);
}

$CIs = array();
$sql5 = "SELECT  name  FROM `address` where pid = '$CIDs[0]';";
$result5 = mysqli_query($conn, $sql5);
while ($x = mysqli_fetch_array($result5))
{
    global $CIs;
    array_push($CIs, $x[0]);
}

?>
     <label>City</label>
  <select name = "City" >
  <?php 
    for ($x = 1; $x <count($CIs); $x++)    
    {
    ?>
  <option  value = "<?php echo $CIs[$x];?>"> <?php echo $CIs[$x];?> </option>  
  <br> 
<?php
   }
?>
  </select>
<?php

}
?>