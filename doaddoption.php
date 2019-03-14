<?php
//Edited to Object Oriented
include"usertype.php";
include"useroptions.php";

session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}

	$R = $_POST['role'];
	$O = $_POST['option'];
	$UT= new usertype();
	$UT->id = $R;
	$Options = new useroptions();
	$Options->id =$O;
	$Options->giveoption($Options, $UT);
	$sql = "Insert INTO usertypeoptions (userTypeId,optionsId) values('".$RIDs."','".$OIDs."')";
    mysqli_query($conn,$sql);
    	   header("Location:UTD.php");
	       echo "<script>alert('A New Option  has been add to a usertype')</script>";

?>