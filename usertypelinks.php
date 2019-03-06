<?php
include"mydatabaseconnection.php";

class usertypelinks
{
public $linkid;
public $typeid;
public $id;



    static function addusertypelinks ($obj)
    {
        $DB=new database();
        $conn=$DB->DBC();
        $sql1 = "SELECT id FROM `usertype` WHERE type='$R'";
        $result1 = mysqli_query($conn, $sql1);
        while ($x = mysqli_fetch_array($result1))
        {
        $RIDs= $x[0];
        }

        $sql = "Insert INTO usertypelinks (typeid,linkid) values('".$RIDs."', '".$L."')";
        mysqli_query($conn,$sql);
            header("Location:index.php");


    }


    static function editusertypelinks ($obj)
    {
        $DB=new database();
        $conn=$DB->DBC();


    }

    static function deleteusertypelinks ($obj)
    {
        $DB=new database();
        $conn=$DB->DBC();
    }
    static function updateusertypelinks ($obj)
    {
        $DB=new database();
        $conn=$DB->DBC();
        $sql1 = "SELECT id FROM `usertype` WHERE type='$R'";
        $result1 = mysqli_query($conn, $sql1);
        while ($x = mysqli_fetch_array($result1))
        {
        $RIDs= $x[0];
        }
        $sql="UPDATE usertypelinks
                SET linkid = $L
                WHERE typeid = $RIDs;";
        mysqli_query($conn,$sql);
        header("Location:index.php");
    }
}
?>