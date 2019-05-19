<?php
 require_once"mydatabaseconnection.php";
 require_once"notifications.php";
require_once"invoice.php";

class reservationdetails
{
public $quantity;
public $radiologyid;
public $reserveid;
public $id;


public static function selectformyres($lid)
{    
  $DB=database::getinstance();
  $OID = reserve::selectmyres($lid);  
  $length = count($OID);
  $array;
  for ($i=0; $i<$length;$i++)
  { 
    //echo "<h1>".$i."</h1>";    
    $ID=$OID[$i]['ID']; 
    $result = $DB->query("reservationdetails", " ReserveID= '$ID' and isdeleted='false'");
    while($row = mysqli_fetch_array($result)){$array[$i] = $row;}
  } 
        if($i>0){return $array;}
        else return;

}


public static function selectforadminview()
{

  $DB=database::getinstance();

 $result = $DB->query("reservationdetails", " isdeleted='false'");
  $i = 0;
  $array;
  while($row = mysqli_fetch_array($result))
    {
            $array[$i]=$row;
            $i++;
    }
    return $array; 
}

public static function addreservationdetails ($lastidreserved,$pid)
{
    $DB=database::getinstance();
    echo"<h4> $lastidreserved</h4>";
    $reserveDetails = new reservationdetails();
    $reserveDetails->reserveId=$lastidreserved;
    $reserveDetails->radiologyId=$_POST['radiology'];
    $reserveDetails->quantity=1;
    $insertReserveDet=$DB->insertquery("reservationdetails","ReserveID , RadiologyID, quantity", 
        "'$reserveDetails->reserveId', '$reserveDetails->radiologyId','$reserveDetails->quantity'");
    $invoice = new invoice();
    $invoice->addtoinvoicelist($pid,$reserveDetails->radiologyId);
 // header("Location:reservation.php");
}


static function editreservationdetails ($obj)
{



}

static function deletereservationdetails ($obj)
{
 


}

public static function retriveforedit()
{
    $DB=database::getinstance();
    $result1 = $DB->query("reservationdetails", "isdeleted='false'");
    echo "<select  name='reserve'>";
    while($row = mysqli_fetch_array($result1))
    {
        $ResID = $row['ReserveID'];
        $RadID = $row['RadiologyID'];
        $result2 = $DB->query("reserve", " ID = '$ResID' AND isdeleted = 'false'");
        while($row2 = mysqli_fetch_array($result2))
        {   
            $pid = $row2['PatientID'];
            $result3 = $DB->query("user", " id = '$pid' AND isdeleted = 'false'");
            $row3 = mysqli_fetch_array($result3);
            $did = $row2['DoctorID'];
            $result4 = $DB->query("user", " id = '$did' AND isdeleted = 'false'");
            $row4 = mysqli_fetch_array($result4);
            ?>
            <option value="<?php echo $row2['ID']; ?>" >
            <?php
            echo $row3['lastname']; echo " with Dr : "; echo $row4['lastname'];
            echo " On : "; echo $row2['Date']; echo "<br>";
            echo "</option>";
        }
    }
    echo "</select>";
}

public static function Retrievereservationdetails ()
{
 //include"mydatabaseconnection.php";
    
    $DB=database::getinstance();

    $first=$_SESSION['FirstName'];
    $second=$_SESSION['LastName'];
    echo "<h2>My Reservations</h2>";
    echo"<p>Name: $first $second</p>";
    $id=$_SESSION['ID'];
    $sql = "SELECT * FROM `reserve` WHERE PatientID= $id AND isdeleted = 'false'";
    $result = $DB->query("reserve", " PatientID= '$id' AND isdeleted = 'false'");
    while($row = mysqli_fetch_array($result))
    {
        $IDD=$row['ID'];
        $DoctorID = $row["DoctorID"];
        $result2 = $DB->query("user", " id = '$DoctorID' AND isdeleted = 'false'");
        while($row2 = mysqli_fetch_array($result2))
    {
        $drfirstn=$row2['firstname'];
        $drlastn=$row2['lastname'];
        echo"<p>Dr: $drfirstn $drlastn</p>";

    }

    $sql3="SELECT * FROM `mrc`.`reserve` WHERE `ID` = $IDD AND isdeleted = 'false'";
    $result3 = $DB->query("reserve", " ID = $IDD AND isdeleted = 'false'");
    if($row = mysqli_fetch_array($result3))
    {
        $Date=$row["Date"];
        echo"<p>Date and Time: $Date</p>";

    }

        $result5 = $DB->query("reservationdetails", " ReserveID=$IDD AND isdeleted = 'false'");
        while($row2 = mysqli_fetch_array($result5))
        {
        $RadID=$row2['RadiologyID'];

        $sql6="SELECT * FROM `mrc`.`radiology` WHERE `ID` = $RadID AND isdeleted = 'false'";
        $result6 = $DB->query("radiology", " ID=  = $RadID AND isdeleted = 'false'");
        while($row6 = mysqli_fetch_array($result6))
        {
            $RadiologyName=$row6['Name'];
            $Price=$row6['price'];
            echo"<p>Operation: $RadiologyName</p>";
            echo"<p>Price: $Price</p>";

        }

        }
    }
}




}
?>