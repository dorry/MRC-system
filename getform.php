<?php
//Not Edited to Object Oriented

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);

$RIDs = $_REQUEST["e"];



$sql3 = "SELECT  * FROM `user` where usertypeid= '$RIDs';";
$result3 = mysqli_query($conn, $sql3);
echo "Users";
echo "<br>";
echo "<select name = 'user'>";
 if(mysqli_num_rows($result3) > 0){
     while($row3 = mysqli_fetch_array($result3))
    {
?>
 <option value = "<?php echo $row3['id']; ?>" id = "<?php echo $row3['id'];?>"> <?php echo $row3['firstname'];  echo $row3['lastname'];?> </option>  

  <?php
}
}
?>

</select>
	<?php
	$sql5 = "SELECT  * FROM `usertypeoptions` where userTypeId= '$RIDs';";
	$result5 = mysqli_query($conn, $sql5);
 		if(mysqli_num_rows($result5) > 0){
			$oname = array();
     		while($row = mysqli_fetch_array($result5))
    	{
			
    		$OID = $row['optionsId'];
			$sql6 = "SELECT  * FROM `useroptions` where id= '$OID';";
			$result6 = mysqli_query($conn, $sql6);
			
				 if(mysqli_num_rows($result6) > 0){
					 
		   	     while($rowUsOp = mysqli_fetch_array($result6))
		 		  {
					
					  
					  

	 ?>

	<input name="<?php echo $rowUsOp['name']?>" type="<?php echo $rowUsOp['type']; ?>" placeholder="Type <?php echo $rowUsOp['name']; ?>"> 
	
<?php
}
}
}
}

?>


