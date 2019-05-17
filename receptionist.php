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
    $user = new user();
    $array = $reserve->selectforinvoice($pid);
    $patientname = $user->selectforpdf($pid);
    $length = count($array);
    $DW = new radiologyprice();
        for ($i = 0; $i < $length; $i++)
        {
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
      date_default_timezone_set('Africa/Cairo');
      $timezone = date_default_timezone_get();
      $date = date('m/d/Y h:i:s a', time()); 
      $content = '<h2> Misr Radiology Center </h2> ';
      $content .= '<div style ="text-align=center;" >';
      $content = '<img  style ="height: 60px; width: 300px;" src="assets/images/logo/logo.png" alt="" title="" />';
       $content .= "<br>";
       $content .= "<br>";
       $content .= "Date : " . $date;
       $content .= "<br>";
       $content .= "<br>";
       $content .= '<span>Invoice </span>';
       $content .= "for Patient :" .$patientname[0]['firstname'] . " ". $patientname[0]['lastname'];
       $content .= "<br>";
       $content .= "<br>";
       $content .= $DW->lis();
       $content .= "<br>";
       $content .= "Total Cost : ";
       $content .= $DW->price();
       $content .= '</div>';
       echo $content;
       return $content;
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