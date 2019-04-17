<?php 
require_once 'usertype.php';
require_once 'usertypeview.php';
class usertypeview
{

public static function edittypeform (){

?>
   
       <input type="text" name="newname" placeholder="Type the new usertype name">
       <input type="submit" name="doedittype" value="Edit"/>

<?php

}

public static function createtypeform (){

?>
   <h3>Add UserType</h3>
    <input type="text" name="name" placeholder="Type name" />
    <input type="submit" name="docreatetype" value="Create" />

<?php

}

public static function showusertypes(){
  echo "<table width='30%'>";
  echo "<tr>
        <th>Usertype</th>
        <th>id</th>
        </tr>"; 
    $result = usertype::selectallusertypes();
    $length =  count($result);

        for ($i=0; $i<$length;$i++)
    {
?>

<tr>
<td> <?php echo $result[$i]['type'];?> </td>
<td> <?php echo $result[$i]['id'];?> </td>
</tr>

<?php

    }

        echo "</table>";
          }

public static function showusertypedropdown(){

	$result = usertype::selectallusertypes();
	$length =  count($result);
 
    echo"<label>Usertypes</label>";
    echo" <select name='role'>";
    for ($i=0; $i<$length;$i++)
		{
?>
	  <option value = "<?php echo $result[$i]['id'];?>">
              <?php 
              echo $result[$i]['type'];
              ?>
      </option>
<?php

}
	echo "</select>";
}
}  

?>