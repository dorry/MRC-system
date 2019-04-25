<?php
require_once"mydatabaseconnection.php";

class usertype
{
public $type;
public $id;
static function selectallusertypes(){
  $DB=database::getinstance();
  $result = $DB->query("usertype", "isdeleted='false' and ID>1");
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




}
?>