<?php

class links
{

public $id;
public $linkname;
public $physicallink;

static function retriveforgivelink()
{
   
    $DB=database::getinstance();
    $result4 = $DB->query("links", "isdeleted = 'false'");
    $i = 0;
    $array;
    if(mysqli_num_rows($result4) > 0){
      while($row = mysqli_fetch_array($result4))
     {
        $array[$i]=$row;
        $i++;
 
 }
 return $array;

 }


}

static function addlink ($obj,$obj1)
{
    $DB=new database();
    $conn=$DB->DBC();
	$sql = "Insert INTO usertypelinks (typeid,linkid) values('$obj1->id', '$obj->id')";
    mysqli_query($conn,$sql);
    header("Location:Roles.php");

}

static function createlink ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
	$sql = "Insert INTO links (linkname,physicallink) values('$obj->linkname','$obj->physicallink')";
    mysqli_query($conn,$sql);
    echo $sql;
    header("Location:linkCRUD.php");

}


static function editlink ($obj,$obj1)
{
    $DB=new database();
    $conn=$DB->DBC();

	$sql="UPDATE usertypelinks
		  SET linkid = $obj->id
		  WHERE typeid = $obj1->id;";
    mysqli_query($conn,$sql);
    header("Location:index.php");



}

static function deletelink ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql="UPDATE links SET isdeleted='true'
    WHERE id = $obj->id";
mysqli_query($conn,$sql);
header("Location:index.php");
}

}
?>