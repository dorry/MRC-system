
<?php 
require_once"mydatabaseconnection.php";
$DB=database::getinstance();
$result=$DB->query("static","id = 1");
    if($row = mysqli_fetch_array($result))
   {

       echo $row['content'];
    }
    
?>
