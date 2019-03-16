<?php
require_once"mydatabaseconnection.php";
$DB=new database();
$conn=$DB->DBC();

$query = "SELECT  content  FROM static WHERE id = 1";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    if($row = mysqli_fetch_array($result))
   {    echo "<form method = 'Post'>";
        echo"<pre> <textarea name = 'code' style ='width:100%;height:100%'  >";
        echo  htmlspecialchars($row['content']);
      echo "</textarea>";
       echo" </pre> ";
       echo "<input type = 'submit' name = 'submit' value = 'Apply Changes'>";
       echo "</form >";
    }}
    
    if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $code = mysqli_real_escape_string($conn,$code);
    $applyChangesQuery = "update static set content='$code' where id =1";
    mysqli_query($conn,$applyChangesQuery);
    }
?>