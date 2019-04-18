<?php
require_once"mydatabaseconnection.php";
require_once"usertypeoptions.php";

class useroptions
{
public $type;
public $name;
public $id;


static function selectUTO($rid){
  $DB=new database();
  $conn=$DB->DBC();
  $OID = usertypeoptions::selectUTOeav($rid);  
  $length = count($OID);
  $array;
  for ($i=0; $i<$length;$i++)
  { 
    $ID=$OID[$i]['optionsId']; 
    $query = "SELECT  * FROM `useroptions` where id= '$ID';";
    $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
      $array[$i] = $row;
    }
    else {
      return;
    }

  } 

  return $array;

}

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