<?php 
require_once"user.php";
require_once"reservationdetails.php";
require_once"mydatabaseconnection.php";
require_once "Radiologies.php";
require_once "radiologyprice.php";

class receptionist extends user{

static function viewpatientinvoice($pid)
{
    $DB=database::getinstance();  
    $reserve = new reservationdetails();
    $array = $reserve->selectforinvoice($pid);
    $length = count($array);
    $DW = new radiologyprice();
        for ($i = 0; $i < $length; $i++)
        {
           //secho "<h2>". $array[$i]['RadiologyID'] . "</h2>";
           if($array[$i]['RadiologyID'] == 4)
           {
            $DW = new UVray($DW);
           }
           if($array[$i]['RadiologyID'] == 2)
           {
            $DW = new CT($DW);
           }
           if($array[$i]['RadiologyID'] == 1)
           {
            $DW = new PET($DW);
           }
           if($array[$i]['RadiologyID'] == 3)
           {
            $DW = new XRay($DW);
           }

        }       
       echo $DW->lis();
       echo "<br>";
       echo $DW->price();

    //    echo $DW->list();
        //return $DW;
}
static function showpatientsforinvoice()
{
    $DB=database::getinstance();  
    $reserve = new reserve();
    $array = $reserve->showpatientswithreserves();
    $length = count($array);
        for ($i = 0; $i < $length; $i++)
        {
            $id = $array[$i]['PatientID'];
            $result4 = $DB->query("user", "isdeleted = 'false' AND id = '$id'");
                while($row = mysqli_fetch_array($result4))
                {
                    $arraypatients[$i]=$row;
                }
            }
        if($i!=0){return $arraypatients;}
}



}

?>