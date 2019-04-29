<?php 
require_once"user.php";
require_once "Interfaces.php";
require_once"mydatabaseconnection.php";
class patient extends user implements IObserver{


    public function update($array)
    {
        $length = count($array);
        $counter = 0;
        for ($i = 0; $i < $length; $i++){
        if($_SESSION['ID'] == $array[$i]['patid'] && $array[$i]['resid'] == "")
        {
            $counter++;
        }
    }
    if($counter != 0){
    echo "<li><b> $counter </b> </li>";
}
}


public function setviewreport($lid)
{
  $DB=database::getinstance();  
  $result=$DB->updatequery("notifications","isviewed", "true" ,"patid = '$lid' and resid IS NULL");
}




}
?>