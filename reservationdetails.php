<?php
 require_once"mydatabaseconnection.php";
//msh ha3rf a7ot el include di hena 3ashan btegy include database di mn function gwa class tanya betndah 3ala function hena
class reservationdetails
{
public $quantity;
public $radiologyid;
public $reserveid;
public $id;


public static function addreservationdetails ($lastidreserved)
{
    $DB=new database();
    $conn=$DB->DBC();
    
    $reserveDetails->reserveId=$lastidreserved;
    $reserveDetails->radiologyId=$_POST['radiology'];
    $reserveDetails->quantity=1;

  //$reserveDetails = new reservationDetails( mysqli_insert_id($conn),$_POST['radiology'],1);
  $insertReserveDet = "insert into reservationdetails (ReserveID , RadiologyID, quantity) values ($reserveDetails->reserveId, $reserveDetails->radiologyId,$reserveDetails->quantity)";
  mysqli_query($conn,$insertReserveDet);

}


static function editreservationdetails ($obj)
{



}

static function deletereservationdetails ($obj)
{
 


}

public static function retriveforedit()
{
    $DB=new database();
    $conn=$DB->DBC();

    $sql1 = "SELECT * FROM  reservationdetails";    
    $result1 = mysqli_query($conn, $sql1);
    echo "<select  name='reserve'>";
    while($row = mysqli_fetch_array($result1))
    {
        $ResID = $row['ReserveID'];
        $RadID = $row['RadiologyID'];
        
        $sql2 = "SELECT * FROM reserve WHERE ID = '$ResID' ";
        $result2 = mysqli_query($conn,$sql2);
        while($row2 = mysqli_fetch_array($result2))
        {   
            $pid = $row2['PatientID'];
            $sql3 = "SELECT * FROM user WHERE id = '$pid'";
            $result3 = mysqli_query($conn,$sql3);
            $row3 = mysqli_fetch_array($result3);
                        
            $did = $row2['DoctorID'];
            $sql4 = "SELECT * FROM user WHERE id = '$did'";
            $result4 = mysqli_query($conn,$sql4);
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
    
    $DB=new database();
    $conn=$DB->DBC();
    $first=$_SESSION['FirstName'];
    $second=$_SESSION['LastName'];
echo "<h2>My Reservations</h2>";
echo"<p>Name: $first $second</p>";
$id=$_SESSION['ID'];
$sql = "SELECT * FROM `reserve` WHERE PatientID= $id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
    $IDD=$row['ID'];
    $DoctorID = $row["DoctorID"];
    $sql2="SELECT * FROM `mrc`.`user` WHERE `id` = $DoctorID";
    $result2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_array($result2))
{
    $drfirstn=$row2['firstname'];
    $drlastn=$row2['lastname'];
    echo"<p>Dr: $drfirstn $drlastn</p>";

}

$sql3="SELECT * FROM `mrc`.`reserve` WHERE `ID` = $IDD";
$result3 = mysqli_query($conn, $sql3);
if($row = mysqli_fetch_array($result3))
{
    $Date=$row["Date"];
    echo"<p>Date and Time: $Date</p>";

}

 
    $sql4="SELECT * FROM `reservationdetails` WHERE ReserveID=$IDD";
    $result5 = mysqli_query($conn, $sql4);
    while($row2 = mysqli_fetch_array($result5))
{
    $RadID=$row2['RadiologyID'];

    $sql6="SELECT * FROM `mrc`.`radiology` WHERE `ID` = $RadID";
    $result6 = mysqli_query($conn, $sql6);
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

public static function ViewAllReservationForAdmin()
{
    $DB=new database();
    $conn=$DB->DBC();
    $first=$_SESSION['FirstName'];
    $second=$_SESSION['LastName'];
echo "<h2>Patient Reservations</h2>";
echo"<p>Admin: $first $second</p>";
// $id=$_SESSION['ID'];
$sql = "SELECT * FROM `reserve` WHERE PatientID> '0' and isdeleted = 'false'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
    $IDD=$row['ID'];
    $DoctorID = $row["DoctorID"];
    $sql2="SELECT * FROM `mrc`.`user` WHERE `id` = $DoctorID";
    $result2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_array($result2))
{
    $drfirstn=$row2['firstname'];
    $drlastn=$row2['lastname'];
    echo"<p>Dr: $drfirstn $drlastn</p>";

}
// $IDD=$row['ID'];
$PatientID = $row["PatientID"];
$sql21="SELECT * FROM `mrc`.`user` WHERE `id` = $PatientID";
$result21 = mysqli_query($conn, $sql21);
while($row2 = mysqli_fetch_array($result21))
{
$Patfirstn=$row2['firstname'];
$Patlastn=$row2['lastname'];
echo"<p>Patient: $Patfirstn $Patlastn</p>";

}
$sql3="SELECT * FROM `mrc`.`reserve` WHERE `ID` = $IDD";
$result3 = mysqli_query($conn, $sql3);
if($row = mysqli_fetch_array($result3))
{
    $Date=$row["Date"];
    echo"<p>Date and Time: $Date</p>";

}

 
$sql4="SELECT * FROM `reservationdetails` WHERE ReserveID=$IDD";
    $result5 = mysqli_query($conn, $sql4);
    while($row2 = mysqli_fetch_array($result5))
{
    $RadID=$row2['RadiologyID'];

    $sql6="SELECT * FROM `mrc`.`radiology` WHERE `ID` = $RadID";
    $result6 = mysqli_query($conn, $sql6);
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