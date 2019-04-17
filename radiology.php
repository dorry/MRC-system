<?php
require_once "mydatabaseconnection.php";

class radiology
{
    public $name;
    public $price;
    public $id;

    static function retriveforgivelink()
    {

        $DB=new database();
        $conn=$DB->DBC();
        $i = 0;
        $sql4 = "SELECT  *  FROM `radiology` WHERE isdeleted = 'false'";
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

    static function retriveradiology ()
    {
        $DB=new database();
        $conn=$DB->DBC();
        $i = 0;
        $sql4 = "SELECT  *  FROM `radiology` WHERE isdeleted = 'false'";
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
}
?>