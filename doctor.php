<?php 
require_once "user.php";
require_once "mydatabaseconnection.php";
require_once "Interfaces.php";
require_once "notifications.php";
require_once "notification.php";
require_once "usertype.php";
class doctor extends user implements IObserver
{


    public $department;

public function update($array)
{
    if($_SESSION['UTID'] == 3)
    {
        $length = count($array);
        $counter = 0;
            for ($i = 0; $i < $length; $i++)
            {
                if($_SESSION['ID'] == $array[$i]['recieverID'] ){$counter++;}
            }

    if($counter != 0){echo "<li><b> $counter </b> </li>";}
    }
}
    public function setview($lid)
    {
        $DB=database::getinstance();  
        $result=$DB->updatequery("recievednoti","isviewed", "true" ,"recieverID = '$lid'");
    }
    static function writepatientreport($report)
    {
        $DB=database::getinstance();  
        $lastidreserved = $DB->insertlast("patientreport","docid , patid, radid, technique, findings, opinion, isdeleted" , "'$report->docid', '$report->patid', '$report->radid', '$report->technique', '$report->findings', '$report->opinion', 'false'");
     $notification = new notification();
    $notification->addnotification($report->docid,$report->patid);
    if($lastidreserved)
      { 
        header("Location:doctorPanel.php?success=1");
      }
      else
      {
        header("Location:doctorPanel.php?success=0");
      }
      //  header("Location:doctorPanel.php");
    }
    static function getreportsforview()
    {
        $DB=database::getinstance();  
        $i = 0;
        $sql4 = "SELECT  *  FROM `patientreport`
                 WHERE isdeleted = 'false'
                 AND docid = '".$_SESSION['ID']."'";
        $result4 = $DB->query("patientreport","isdeleted = 'false' AND docid = '".$_SESSION['ID']."' ");
            while($row = mysqli_fetch_array($result4))
            {
                $array[$i]=$row;
                $i++;
            }
            if($i !=0){return $array;}
            
    }
    static function getreportsforviewp()
    {
        $DB=database::getinstance();  
        $i = 0;
        $sql4 = "SELECT  *  FROM `patientreport`
                 WHERE isdeleted = 'false'
                 AND patid = '".$_SESSION['ID']."'";
        $result4 = $DB->query("patientreport","isdeleted = 'false' AND patid = '".$_SESSION['ID']."' ");
            while($row = mysqli_fetch_array($result4))
            {
                $array[$i]=$row;
                $i++;
            }
            if($i!=0)
            {
            return $array;
            }
    }
    static function getpatientsforview($array)
    {
        $DB=database::getinstance();  
        $i = 0;
        $length = count($array);
        for ($i = 0; $i < $length; $i++)
        {
            $id = $array[$i]['patid'];
            $result4 = $DB->query("user", "isdeleted = 'false' AND id = '$id'");
                while($row = mysqli_fetch_array($result4))
                {
                    $arraypatients[$i]=$row;
                }
        }
        $length2 = count($array);
        if($length2==0){return;}
        else return $arraypatients;
    }
    static function getdoctorsforview($array)
    {
        $DB=database::getinstance();  
        $i = 0;
        $length = count($array);
        for ($i = 0; $i < $length; $i++)
        {
            $id = $array[$i]['docid'];
            $result4 = $DB->query("user", "isdeleted = 'false' AND id = '$id'");
                while($row = mysqli_fetch_array($result4))
                {
                    $arraypatients[$i]=$row;
                }
        }
        $length2 = count($array);
        if($length2==0){return;}
        else return $arraypatients;
    }
    static function showpatientreport($reportid)
    {
        $DB=database::getinstance();  
        $result;
        $i = 0;
        $sql4 = "SELECT  *  FROM `patientreport` WHERE isdeleted = 'false' AND id = $reportid";
        $result4 = $DB->query("patientreport", "isdeleted = 'false' AND id = '$reportid'");
        while($row = mysqli_fetch_array($result4)){$array[$i]=$row;}
        $id = $array[$i]["patid"];
        $result4 = $DB->query("user", "isdeleted = 'false' AND id = '$id'");
        while($row = mysqli_fetch_array($result4))
        {
            $patname = $row['firstname']." ".$row['lastname'];
        }
        $id = $array[$i]["docid"];
        $sql4 = "SELECT  *  FROM `user` WHERE isdeleted = 'false' AND id = '$id'";
        $result4 = $DB->query("user", "isdeleted = 'false' AND id = '$id'");
            while($row = mysqli_fetch_array($result4))
            {
                $docname = $row['firstname'].$row['lastname'];
            }
        $id = $array[$i]["radid"];
        $result4 = $DB->query("radiology", "isdeleted = 'false' AND id = '$id'");
            while($row = mysqli_fetch_array($result4))
            {
                $radname = $row['Name'];
            }
        $arrayAll = array($patname, $docname, $radname, $array[0]['technique'], $array[0]['findings'], $array[0]['opinion']);
        return $arrayAll;
    }
}
?>