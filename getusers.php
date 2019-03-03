<?php
 $servername = "localhost";
 $username = "id8878100_root";
 $password = "fz@ayV3V#@2W!Zd^1qwN";
 $dbname = "id8878100_mrc";
 $conn = mysqli_connect($servername,$username,$password,$dbname);

$role = $_REQUEST["e"];

if($role !== "")
{
$sql4 = "SELECT  id  FROM `usertype` where type = '$role'";
$result4 = mysqli_query($conn, $sql4);
while ($x = mysqli_fetch_array($result4))
{
	$RIDs= $x[0];
}

$sql5 = "SELECT  * FROM `user` where usertypeid= '$RIDs';";
$result5 = mysqli_query($conn, $sql5);
echo "s"; echo "<br>";
echo "<select name = 'users'>";
 if(mysqli_num_rows($result5) > 0){
     while($row = mysqli_fetch_array($result5))
    {
 ?>
 <option  id = "<?php echo $row['id'];?>"> <?php echo $row['firstname'];  echo $row['lastname'];?> </option>  
  <br> 
<?php
}
}
}
?>
  </select>