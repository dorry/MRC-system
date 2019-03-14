<?php

class links
{

public $id;
public $linkname;
public $physicallink;

static function retriveforgivelink()
{
    $DB=new database();
    $conn=$DB->DBC();
    echo"<label>Links</label>";
    echo" <select name='link'>";
    $sql4 = "SELECT  *  FROM `links`";
    $result4 = mysqli_query($conn, $sql4);
    if(mysqli_num_rows($result4) > 0){
      while($row = mysqli_fetch_array($result4))
     {
  ?>
          <option value = "<?php echo $row['id'];?>"> <?php echo $row['linkname'];?> </option>  
 <?php 
 }
 ?>
          </select>
 
 <?php
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
    $sql="DELETE FROM links
    WHERE id = $obj->id";
mysqli_query($conn,$sql);
header("Location:index.php");
}

}
?>