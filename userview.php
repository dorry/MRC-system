<?php 
require_once 'user.php';
require_once 'reserve.php';
require_once 'reservationdetails.php';
require_once 'radiology.php';
class userview
{
   
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




}
?>