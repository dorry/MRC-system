<?php 
require_once 'user.php';
require_once 'usertype.php';
class userview
{

public static function showedituserform(){
?>
  <h3>Edit User</h3>
	<label>Username</label>
    <input type="text" name="UName" placeholder="Username" />
    <label>email</label>
    <input type="text" name="email" placeholder="E-mail" />
    <label>password</label>
    <input type="password" name="password" placeholder="Password"/>
    <label>Usertype</label>
<?php


}

public static function showuserdropdown(){


	$result = user::selectallusers();
	$length =  count($result);
 
    echo"<label>Users</label>";
    echo" <select name='user'>";
    for ($i=0; $i<$length;$i++)
		{
?>
	  <option  value = "<?php echo $result[$i]['id'];?>">
                <?php 
                echo $result[$i]['firstname'];
                echo " "; 
                echo $result[$i]['lastname'];
                ?>
      </option>


<?php

}
	echo "</select>";
}

public static function showuser(){
	echo "<table width='30%'>";
	echo "<tr>
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