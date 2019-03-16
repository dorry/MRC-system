<?php
class useroptions
{
public $type;
public $name;
public $id;

static function retriveforlinks(){

    $DB=new database();
    $conn=$DB->DBC();
    
    echo"<label>Options</label>";
    echo" <select name='option'>";
    $query = "SELECT  *  FROM `useroptions` WHERE isdeleted='false'";
    $result = mysqli_query($conn, $query);
    echo"<label >Options</label>";
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
       {
    ?>
            <option value = "<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
      <?php 
        }
        echo "</select>";
        echo "<br>";

   ?>
   
   <?php
   }



}

static function adduseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
	$sql = "Insert INTO useroptions (name,type) values('$obj->name','$obj->type')";
    mysqli_query($conn,$sql);
    header("Location:UTD.php");
	echo "<script>alert('A New Option  has been created')</script>";
}

static function giveoption($obj,$obj1)
{
    $DB=new database();
    $conn=$DB->DBC();
	$sql = "Insert INTO usertypeoptions (optionsId,userTypeId) values('$obj->id','$obj1->id')";
    mysqli_query($conn,$sql);
    echo $sql;
    	   header("Location:UTD.php");

}


static function edituseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

static function deleteuseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql="UPDATE `useroptions` SET isdeleted = 'true'
    WHERE id = $obj->id";
    mysqli_query($conn,$sql);
    header("Location:UTD.php");

}


}
?>