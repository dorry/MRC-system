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
    $DB=database::getinstance();  
        $i = 0;
        $result4 = $DB->query("reserve", "isdeleted = 'false' AND DoctorID = '".$_SESSION['ID']."'");
            while($row = mysqli_fetch_array($result4))
            {
                $array[$i]=$row;
                $i++;
            }
            if($i != 0){return $array;}
}
    static function getradforreport()
    {
      $DB=database::getinstance();  
      $i = 0;
      $result4 = $DB->query("radiology", "isdeleted = 'false'");
        while($row = mysqli_fetch_array($result4))
        {
          $array[$i]=$row;
          $i++;
        }
        return $array;
      }
}
?>