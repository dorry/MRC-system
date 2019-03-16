<?php
require_once"mydatabaseconnection.php";
$DB=new database();
$conn=$DB->DBC();

session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}

$i = 0;

if(isset($_POST['eutd_submit'])){
  $R = $_POST['roleid'];
  $U =  $_POST['user'];

  $sql5 = "SELECT  * FROM `usertypeoptions` where userTypeId=$R" ;
	$result5 = mysqli_query($conn, $sql5);
 		if(mysqli_num_rows($result5) > 0){
			$oname = array();
			$usertypeoptions = array();
     		while($row = mysqli_fetch_array($result5))
    	{
    		$OID = $row['optionsId'];
			$sql6 = "SELECT  * FROM `useroptions` where id= '$OID';";
			$result6 = mysqli_query($conn, $sql6);
				 if(mysqli_num_rows($result6) > 0){
		   	     while($rowUsOp = mysqli_fetch_array($result6))
		 		  {
					
					   array_push($oname, $rowUsOp['name']);
                      
                   }
                }
            }
        }
	$get_uto_id = "select id from usertypeoptions where userTypeId =$R" ;
	//echo $get_uto_id;
  $result_uto = mysqli_query($conn, $get_uto_id);
  $sql10 = "SELECT userTyOpId from useropvalue where userId = $U";
  $result10 =mysqli_query($conn,$sql10);
  // secho $sql10;
  if(mysqli_num_rows($result10) > 0){
    while($row55= mysqli_fetch_array($result10))
 {
    
   array_push($usertypeoptions, $row55['userTyOpId']);
            
         }
      }
 		if(mysqli_num_rows($result_uto) > 0){
			
     		while($row = mysqli_fetch_array($result_uto))
    	{
			 $insert_values = "UPDATE useropvalue
        SET value='".$_POST[$oname[$i]]."' 
        WHERE userTyOpId = ".$usertypeoptions[$i]." " ;
            echo $insert_values;
             mysqli_query($conn , $insert_values);
			       $i++;
    }
  
     }
     
			}
 ?>