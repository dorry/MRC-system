<?php 
include "user.php";
require_once "mydatabaseconnection.php";

class doctor extends user
{
    public $department;
    static function writepatientreport($report)
    {
        $DB=new database();
        $conn=$DB->DBC();
        $insert = "insert into patientreport 
        (docid , patid, radid, technique, findings, opinion, isdeleted) 
        values ($report->docid, $report->patid, $report->radid, '$report->technique', '$report->findings', '$report->opinion', 'false')";
        mysqli_query($conn,$insert);
        header("Location:doctorPanel.php");
    }

    static function getreportsforview()
    {
        $DB=new database();
        $conn=$DB->DBC();
        $i = 0;
        $sql4 = "SELECT  *  FROM `patientreport` WHERE isdeleted = 'false' AND docid = '".$_SESSION['ID']."'";
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
    
    static function getpatientsforview($array)
    {
        $DB=new database();
        $conn=$DB->DBC();
        $i = 0;
        $length = count($array);
        for ($i = 0; $i < $length; $i++)
        {
            $id = $array[$i]['patid'];
            $sql4 = "SELECT  *  FROM `user` WHERE isdeleted = 'false' AND id = $id";
            $result4 = mysqli_query($conn, $sql4);
            if(mysqli_num_rows($result4) > 0)
            {
                while($row = mysqli_fetch_array($result4))
                {
                    $arraypatients[$i]=$row;
                }
            }
        }
        return $arraypatients;
    }
    static function showpatientreport($reportid)
    {
        $DB=new database();
        $conn=$DB->DBC();
        $result;
        $i = 0;
        $sql4 = "SELECT  *  FROM `patientreport` WHERE isdeleted = 'false' AND id = $reportid";
        $result4 = mysqli_query($conn, $sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_array($result4))
            {
                $array[$i]=$row;
            }
        }
        $id = $array[$i]["patid"];
        $sql4 = "SELECT  *  FROM `user` WHERE isdeleted = 'false' AND id = '$id'";
        $result4 = mysqli_query($conn, $sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_array($result4))
            {
                $patname = $row['firstname']." ".$row['lastname'];
            }
        }
        $id = $array[$i]["docid"];
        $sql4 = "SELECT  *  FROM `user` WHERE isdeleted = 'false' AND id = '$id'";
        $result4 = mysqli_query($conn, $sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_array($result4))
            {
                $docname = $row['firstname'].$row['lastname'];
            }
        }
        $id = $array[$i]["radid"];
        $sql4 = "SELECT  *  FROM `radiology` WHERE isdeleted = 'false' AND id = '$id'";
        $result4 = mysqli_query($conn, $sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_array($result4))
            {
                $radname = $row['Name'];
            }
        }
        $arrayAll = array($patname, $docname, $radname, $array[0]['technique'], $array[0]['findings'], $array[0]['opinion']);
        return $arrayAll;
    }
}
?>