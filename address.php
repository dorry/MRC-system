<?php
include"mydatabaseconnection.php";

class address
{
public $pid;
public $name;
public $id;


static function retriveforsignup ()
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "SELECT  name  FROM `address` where pid = 0";
    $result = mysqli_query($conn, $sql);
    $Cs = array();

    while ($x = mysqli_fetch_array($result)) {
        global $Cs;
        array_push($Cs, $x[0]);
    
    }
    echo "<select name ='Country' onchange='test(this.value)'>";
    echo "<option selected=''></option>";

    $c = count($Cs);
    for ($x = 0; $x <count($Cs); $x++)    
    {
    ?>
        <option> <?php echo $Cs[$x];?> </option>  
<br>  
      <?php

    }
    echo "</select>";
}


static function addaddress ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


static function editaddress ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

static function deleteaddress ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


}
?>