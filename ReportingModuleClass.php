<?php
require_once "mydatabaseconnection.php";
require_once "IReport.php";
$GLOBALS['dataPoints'] = array();

class StrategyContext 
{
    private $strategy = NULL; 
    //bookList is not instantiated at construct time
    public function __construct($WhichStrategy) {
        switch ($WhichStrategy) {
            case "Radiology": 
                $this->strategy = new ReservationRep();
            break;
            case "UserTypes": 
                $this->strategy = new UserTypesRep();
            break;
            case"Gender":
                $this->strategy = new GenderRep();
                break;
        }
        $GLOBALS['dataPoints']=$this->strategy->Statistics();

    }

}


class ReservationRep implements IReport
{

    static function Statistics()
    {
        $DB=database::getinstance();
        // $query = "SELECT * FROM radiology";
        $result = $DB->query("radiology","isdeleted='false'");
        $radioarrayid = array();
        $radioarrayname = array();
        while($row = mysqli_fetch_array($result))
            {
                array_push($radioarrayid, $row['ID']);
                array_push($radioarrayname, $row['Name']);
            }
        $i= 0;
        $dataPoints = array();
        for($i; $i < sizeof($radioarrayid); $i++)
        {
            // $query = "SELECT  COUNT(*)  FROM reservationdetails WHERE RadiologyID = '$radioarrayid[$i]'";
            $result = $DB->cquery("reservationdetails","RadiologyID = '$radioarrayid[$i]'");

                $row = mysqli_fetch_array($result);
                $x = array("label"=> $radioarrayname[$i], "y"=> intval($row[0]));
                array_push($dataPoints, $x);
            }
        return $dataPoints;
    }
}

class UserTypesRep implements IReport
{

    public $dataPoints = array();

    static function Statistics()
    {
          $DB=database::getinstance();
        $result = $DB->query("usertype","isdeleted='false'");
        $userarrayid = array();
        $userarrayname = array();

            while($row = mysqli_fetch_array($result))
            {
                array_push($userarrayid, $row['id']);
                array_push($userarrayname, $row['type']);
            }
        $i= 0;
        $dataPoints = array();
        for($i; $i < sizeof($userarrayid); $i++)
        {
            // $query = "SELECT  COUNT(*)  FROM user WHERE usertypeid = '$userarrayid[$i]'";
            $result = $DB->cquery("user","usertypeid = '$userarrayid[$i]'");
                $row = mysqli_fetch_array($result);
                $x = array("label"=> $userarrayname[$i], "y"=> intval($row[0]));
                array_push($dataPoints, $x);
            }
        
        return $dataPoints;
    }
}
    class GenderRep implements IReport
    {
    
        static function Statistics()
        {
            $DB=database::getinstance();
            //SELECT gender FROM `user` GROUP BY gender
            $result = $DB->query("user","isdeleted='false' GROUP BY gender");
            $genderarrayname = array();
            while($row = mysqli_fetch_array($result))
                {
                    array_push($genderarrayname, $row['gender']);
                }
            $i= 0;
            $dataPoints = array();
            for($i; $i < sizeof($genderarrayname); $i++)
            {
                // $query = "SELECT  COUNT(*)  FROM reservationdetails WHERE RadiologyID = '$radioarrayid[$i]'";
                $result = $DB->chooseCountQuery("gender","user","Where gender='$genderarrayname[$i]'");
    
                    $row = mysqli_fetch_array($result);
                    $x = array("label"=> $genderarrayname[$i], "y"=> intval($row[0]));
                    array_push($dataPoints, $x);
                }
            return $dataPoints;
        }
    }
?>