<?php
require_once"mydatabaseconnection.php";
class useroptions
{
public $type;
public $name;
public $id;



static function selectalloptions(){
$DB=new database();
  $conn=$DB->DBC();
    
  $query = "SELECT  *  FROM `useroptions` WHERE isdeleted='false'";
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
    
    echo"<label>Options</label>";
    echo" <select name='option'>";
    $query = "SELECT  *  FROM `useroptions` WHERE isdeleted='false'";
    $result = mysqli_query($conn, $query);
    echo"<label >Options</label>";
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
       {
    ?>
            <option value = "<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
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