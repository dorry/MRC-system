<?php
require_once"mydatabaseconnection.php";
require_once"usertypeoptions.php";

class useroptions
{
public $type;
public $name;
public $id;



static function selectUTO($rid){
  $OID = usertypeoptions::selectUTOeav($rid);  
  $length = count($OID);
  $array;
  for ($i=0; $i<$length;$i++)
  { 
    $ID=$OID[$i]['optionsId']; 
    $DB=database::getinstance();
    $result = $DB->query("useroptions", "id= '$ID' and isdeleted='false'");
      while($row = mysqli_fetch_array($result))
    {
    $array[$i] = $row;
    } 

  return $array;

}

}
static function selectalloptions(){
  $DB=database::getinstance();
  $result = $DB->query("useroptions", "isdeleted='false' ");
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