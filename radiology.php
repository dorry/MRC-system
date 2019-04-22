<?php
require_once "mydatabaseconnection.php";
require_once "reservationdetails.php";
class radiology
{
    public $name;
    public $price;
    public $id;


    public static function selectformyres($lid){
         $DB=new database();
         $conn=$DB->DBC();   
         $PId = reservationdetails::selectformyres($lid); 
         $length = count($PId);
         $array;
         for ($i=0; $i<$length;$i++)
          { 
            $ID=$PId[$i]['RadiologyID']; 
            $query="SELECT * FROM `radiology` WHERE ID = $ID";
            $result = mysqli_query($conn, $query);
            if($row = mysqli_fetch_array($result))
            { 
              $array[$i] = $row;
            }
            else 
            {
              return;
              }
          } 
          $length2 = count($PId);
          if($length2==0){return;}
          else return $array;
  }
    public static function selectforadminview(){


         $DB=new database();
         $conn=$DB->DBC();   
         $PId = reservationdetails::selectforadminview();  
         $length = count($PId);
         $array;
         for ($i=0; $i<$length;$i++)
          { 
            $ID=$PId[$i]['RadiologyID']; 
            $query="SELECT * FROM `radiology` WHERE ID = $ID";
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
 
    static function retriveforgivelink()
    {

        $DB=new database();
        $conn=$DB->DBC();
        $i = 0;
        $sql4 = "SELECT  *  FROM `radiology` WHERE isdeleted = 'false'";
        $result4 = mysqli_query($conn, $sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_array($result4))
            {
                $array[$i]=$row;
                $i++;
            }
            return $array;
        }
    }

    static function retriveradiology ()
    {
        $DB=new database();
        $conn=$DB->DBC();
        $i = 0;
        $sql4 = "SELECT  *  FROM `radiology` WHERE isdeleted = 'false'";
        $result4 = mysqli_query($conn, $sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_array($result4))
            {
                $array[$i]=$row;
                $i++;
            }
            return $array;
        }
    }
}
?>