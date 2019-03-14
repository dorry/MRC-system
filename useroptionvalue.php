<?php
include"mydatabaseconnection.php";

class useropvalue
{
public $value;
public $usertyopid;
public $userid;
public $id;



static function adduseropvalue($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql5 = "SELECT  * FROM `usertypeoptions` where userTypeId= (select id from usertype where type = $R)" ;
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
					
					   array_push($oname, $rowUsOp['name']);
                      
                   }
                }
            }
        }
	$get_uto_id = "select id from usertypeoptions where userTypeId =(select id from usertype where type = $R)" ;
	echo $get_uto_id;
    $result_uto = mysqli_query($conn, $get_uto_id);
    

 		if(mysqli_num_rows($result_uto) > 0){
			
     		while($row = mysqli_fetch_array($result_uto))
    	{

			 $insert_values = "insert into useropvalue (userTyOpId , userId , value) values (" . $row['id'] .",". $_POST['user']. ",'" . $_POST[$oname[$i]]."' )" ;
            echo $insert_values;
             mysqli_query($conn , $insert_values);
			echo $oname[$i];
			$i++;
		}
		 }
			}





static function edituseropvalue($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

static function deleteuseropvalue ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}




}?>