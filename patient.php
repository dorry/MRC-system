<?php 
require_once"user.php";
require_once "Interfaces.php";
require_once"mydatabaseconnection.php";
class patient extends user implements IObserver{

public function update($array)
{
       if($_SESSION['UTID'] == 1){
    // $UT = new usertype();
    // $Arr = $UT->selectallexcept($_SESSION['UTID']);
    // $c = count($Arr);
    //for ($i = 0; $i < $c; $i++)
    //if($_SESSION['UTID'] != $Arr[$i])
        $length = count($array);
        $counter = 0;
        for ($i = 0; $i < $length; $i++)
        {
        if($_SESSION['ID'] == $array[$i]['recieverID'] )
        {
            $counter++;
        }
}

    if($counter != 0)
    {
    echo "<li><b> $counter </b> </li>";
    }
}

}

public function setviewreport($lid)
{
   $DB=database::getinstance();  
   $result=$DB->updatequery("recievednoti","isviewed", "true" ,"recieverID = '$lid'");
    
}




}
?>