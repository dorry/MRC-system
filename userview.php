<?php 
require_once 'user.php';
require_once 'reserve.php';
require_once 'reservationdetails.php';
require_once 'radiology.php';
class userview
{
    public static function ShowDoctorNamesdropdown(){


        $result = user::retrivedoctorsforeditres();
        $length =  count($result);
 
        echo" <select name='doc'>";
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
static function showformyres($lid){

    $result = user::selectuserformyres($lid);
    $length =  count($result);
    $result1 = user::selectformyres($lid);
    $length1 =  count($result1);
    $result2 = reserve::selectmyres($lid);
    $length2 = count($result2);
    $result3 = radiology::selectformyres($lid);
    $length3 = count($result3);
 echo "<h2>Patient Reservations</h2>";
        echo "<table width='65%'>";
    echo "<tr>
          <th>Doctor Name</th>         
          <th>Patient Name</th>         
          <th>Date</th>         
          <th>Radiology</th>         
          <th>Price</th>         
          </tr>";   
               for ($i=0; $i<$length;$i++)
        { 
    $firstn=$result[$i]['firstname'];
    $lastn=$result[$i]['lastname']; 
    $firstn2=$result1[$i]['firstname'];
    $lastn2=$result1[$i]['lastname'];
    $Date = $result2[$i]['Date'];
    $Name = $result3[$i]['Name'];
    $Price = $result3[$i]['price'];
?>
<tr>
    <td>
        <?php echo $firstn; 
           echo " "; 
           echo $lastn?> 
    </td>
    <td>
       <?php echo $firstn2; 
           echo " "; 
           echo $lastn2?>  

    </td>
<td> <?php echo $Date; ?> 
</td>
<td> <?php echo $Name; ?> 
</td>
<td> <?php echo $Price; ?> 
</td>

</tr>
<?php

}
echo "</table>";
}

public static function showedituserform(){
?>
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


public static function showuserdropdowneav($rid){


	$result = user::selectauserseav($rid);
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
<td> <?php echo $result[$i]['id'];?> </td>
<td> <?php echo $result[$i]['firstname'];?> </td>
<td> <?php echo $result[$i]['lastname'];?> </td>
</tr>

<?php

		}

		  	echo "</table>";
		  		}




}

  

?>