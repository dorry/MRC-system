<?php
require_once "mydatabaseconnection.php";
require_once "reservationdetails.php";
class radiology
{
  public $name;
  public $price;
  public $id;

  public static function selectformyres($lid)
  {
    $DB=database::getinstance();  
    $PId = reservationdetails::selectformyres($lid); 
    $length = count($PId);
    $array;
    for ($i=0; $i<$length;$i++)
    { 
      $ID=$PId[$i]['RadiologyID']; 
      $result = $DB->query("radiology", "ID = '$ID' and isdeleted='false'");
      while($row = mysqli_fetch_array($result)){$array[$i] = $row;}
    } 
    $length2 = count($PId);
    if($length2==0){return;}
    else return $array;
  }
  public static function selectforadminview()
  {
    $DB=database::getinstance();
    $PId = reservationdetails::selectforadminview();  
    $length = count($PId);
    $array;
    for ($i=0; $i<$length;$i++)
    { 
      $ID=$PId[$i]['RadiologyID']; 
    //  $query="SELECT * FROM `radiology` WHERE ID = $ID";
      $result = $DB->query("radiology", " ID = '$ID' and isdeleted='false'");
      while($row = mysqli_fetch_array($result)){$array[$i] = $row;}
    } 
    return $array;
  }
  static function retriveforgivelink()
  {
    $DB=database::getinstance();
    $result4 = $DB->query("radiology", "isdeleted='false'");
    $i = 0;

      while($row = mysqli_fetch_array($result4))
      {
        $array[$i]=$row;
        $i++;
      }
      return $array;    
  }

  static function retriveradiology ()
  {
    $DB=database::getinstance();
    $result = $DB->query("radiology", "isdeleted='false'");
    $sql4 = "SELECT  *  FROM `radiology` WHERE isdeleted = 'false'";
    $i =0;
     while($row = mysqli_fetch_array($result4))
      {
        $array[$i]=$row;
        $i++;
      }
      return $array;
  }
}
?>