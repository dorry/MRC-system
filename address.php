<?php
require_once"mydatabaseconnection.php";

class address
{
public $pid;
public $name;
public $id;


static function retriveforsignup ()
{
    $DB=database::getinstance();
    $result = $DB->nquery("address" , "pid=0");
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

<script type="text/javascript">
  
function test(val){

  var xhttp;
  if (val.length == 0) { 
    document.getElementById("City").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("City").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "getcity.php?e="+val, true);
  xhttp.send();  
}

</script>
