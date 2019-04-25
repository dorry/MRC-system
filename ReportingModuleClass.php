<?php
require_once"mydatabaseconnection.php";
require_once"IReport.php";
class report implements IReport
{
    public $dataPoints = array();

    static function Statistics()
    {
        $DB=database::getinstance();
        $query = "SELECT * FROM radiology";
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
            $query = "SELECT  COUNT(*)  FROM reservationdetails WHERE RadiologyID = '$radioarrayid[$i]'";
            $result = $DB->cquery("reservationdetails","RadiologyID = '$radioarrayid[$i]'");

                $row = mysqli_fetch_array($result);
                $x = array("label"=> $radioarrayname[$i], "y"=> intval($row[0]));
                array_push($dataPoints, $x);
            }
        return $dataPoints;
    }
}

class report2 implements IReport
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
            $query = "SELECT  COUNT(*)  FROM user WHERE usertypeid = '$userarrayid[$i]'";
            $result = $DB->cquery("user","usertypeid = '$userarrayid[$i]'");
                $row = mysqli_fetch_array($result);
                $x = array("label"=> $userarrayname[$i], "y"=> intval($row[0]));
                array_push($dataPoints, $x);
            }
        
        return $dataPoints;
    }


}
?>