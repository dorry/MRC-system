<?php
require_once"mydatabaseconnection.php";
class report
{
    public $radiologyname;
    public $numberoftimes;
    public $dataPoints = array();

    static function retriveradiology()
    {
        $DB=new database();
        $conn=$DB->DBC();
        $query = "SELECT * FROM radiology";
        $radioarrayid = array();
        $radioarrayname = array();
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                array_push($radioarrayid, $row['ID']);
                array_push($radioarrayname, $row['Name']);
            }
        }
        $i= 0;
        $dataPoints = array();
        for($i; $i < sizeof($radioarrayid); $i++)
        {
            $query = "SELECT  COUNT(*)  FROM reservationdetails WHERE RadiologyID = '$radioarrayid[$i]'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $x = array("label"=> $radioarrayname[$i], "y"=> intval($row[0]));
                array_push($dataPoints, $x);
            }
        }
        return $dataPoints;
    }
}
?>