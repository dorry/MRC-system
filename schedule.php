<?php 
class schedule
{
	public $id;
	public $starttime;
	public $endtime;
	public $docid;

public static function selectall()
{
	$DB=database::getinstance();
	$result = $DB->query("schedule","isdeleted=false");
    $i=0;
    while($row = mysqli_fetch_assoc($result))
    {
      $array[$i] = $row;
      $i++; 
    }
    return $array;
}
}
?>