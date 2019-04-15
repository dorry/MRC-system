<?php 
require_once 'user.php';

class userview
{

	public static function showuser(){
			echo "<table width='30%'>";
echo "
	<tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>id</th>
  	</tr>";	
  		$result = user::selectallusers();
		$length =  count($result);

  			for ($i=0; $i<$length;$i++)
		{
?>

<tr>
<td> <?php echo $result[$i]['firstname'];?> </td>
<td> <?php echo $result[$i]['lastname'];?> </td>
<td> <?php echo $result[$i]['id'];?> </td>

</tr>

<?php

		}

		  	echo "</table>";
		  		}

}

  

?>