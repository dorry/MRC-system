<?php
require_once"mydatabaseconnection.php";

class usertype
{
public $type;
public $id;




static function selectallusertypes(){
  $DB=new database();
  $conn=$DB->DBC();
    
  $query = "SELECT  *  FROM `usertype` WHERE ID>'1' AND isdeleted='false'";
  $result = mysqli_query($conn, $query);
  $i = 0;
  $array;
  if(mysqli_num_rows($result) > 0)
  {
        while($row = mysqli_fetch_array($result))
       {
        $array[$i]=$row;
        $i++;
       }
      return $array;
}
}



static function retriveforlinks(){

    $DB=new database();
    $conn=$DB->DBC();
    echo"<label>Usertypes</label>";
    echo" <select name='role'>";
    $query = "SELECT  *  FROM `usertype` WHERE ID>'0' AND isdeleted='false'";
    $result = mysqli_query($conn, $query);
    echo"<label >Usertypes</label>";
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
       {
    ?>
            <option value = "<?php echo $row['id'];?>"><?php echo $row['type'];?></option>
      <?php 
        }
        echo "</select>";
        echo "<br>";

   ?>
   
   <?php
   }



}



}
?>