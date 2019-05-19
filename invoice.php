<?php
class invoice
{

	public $id;
	public $uid;
	public $radid;
	public $ispaid;


public function addtoinvoicelist($pid,$radid)
{
	$DB=database::getinstance();
	$DB->insertquery("invoice","uid,radid","$pid,$radid");
}

public function selectforpdfgen($pid)
{
	$DB=database::getinstance();
	$result = $DB->query("invoice","uid='$pid' and ispaid='0'");
	$i = 0;
    $array;
  	while($row = mysqli_fetch_array($result))
    {
      $array[$i]=$row;
      $i++;
    }
    if($i != 0)
    return $array;
    else
      return;
}






}
?>