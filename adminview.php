<?php
require_once 'admin.php';


class adminview{



public static function showdrpatient(){

    $result = user::selectdocforresview();
    $length =  count($result);
    $result1 = user::selectforresview();
    $length1 =  count($result1);
    $result2 = reserve::selectforviewadmin();
    $length2 = count($result2);
    $result3 = radiology::selectforadminview();
    $length3 = count($result3);
    //echo $length1;
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
    $drfirstn=$result[$i]['firstname'];
    $drlastn=$result[$i]['lastname'];
    $Pfirstn=$result1[$i]['firstname'];
    $Plastn=$result1[$i]['lastname'];
    $Date = $result2[$i]['Date'];
    $Name = $result3[$i]['Name'];
    $Price = $result3[$i]['price'];
?>

<tr>
<td> <?php echo $drfirstn; 
           echo " "; 
           echo $drlastn?> 
</td>
<td> <?php echo $Pfirstn; 
           echo " "; 
           echo $Plastn?> 
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

public static function showdrpatientdropdown(){

    $result = user::selectdocforresview();
    $length =  count($result);
    $result1 = user::selectforresview();
    $length1 =  count($result1);
    $result2 = reserve::selectforviewadmin();
    $length2 = count($result2);
    $result3 = radiology::selectforadminview();
    $length3 = count($result3);
    // echo $length1;
        echo "<select name='info'>"; 
        for ($i=0; $i<$length;$i++)
        {   
    $drfirstn=$result[$i]['firstname'];
    $drlastn=$result[$i]['lastname'];
    $Pfirstn=$result1[$i]['firstname'];
    $Plastn=$result1[$i]['lastname'];
    $Date = $result2[$i]['Date'];
    $Name = $result3[$i]['Name'];
    $Price = $result3[$i]['price'];
?>

<option  value = "<?php echo $result[$i]['id'];?>">
                    <?php 
echo $drfirstn; 
 echo " "; 
 echo $drlastn?> 

<?php echo $Pfirstn; 
 echo " "; 
 echo $Plastn?> 

<?php echo $Date; ?> 

<?php echo $Name; ?> 

<?php echo $Price; ?> 
          </option>


<?php
}
            echo "</select>";
}

}