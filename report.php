<?php
class report
{
    public $docid;
    public $patid;
    public $radid;
    public $technique;
    public $findings;
    public $opinion;
    static function showpatientsforreport()
    {
        $DB=new database();
        $conn=$DB->DBC();
        $i = 0;
        $sql4 = "SELECT  *  FROM `reserve` WHERE isdeleted = 'false' AND DoctorID = '".$_SESSION['ID']."'";
        $result4 = mysqli_query($conn, $sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_array($result4))
            {
                $array[$i]=$row;
                $i++;
            }
        }
        $i = 0;
        $length = count($array);
        for ($i = 0; $i < $length; $i++)
        {
            $id = $array[$i]['PatientID'];
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
    static function getradforreport()
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