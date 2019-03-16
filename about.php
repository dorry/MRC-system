
<?php 
require_once"mydatabaseconnection.php";
$DB=new database();
$conn=$DB->DBC();

$query = "SELECT  content  FROM static WHERE id = 1";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    if($row = mysqli_fetch_array($result))
   {

       echo $row['content'];
    }}
    
?>
