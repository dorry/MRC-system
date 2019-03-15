<?php
include"mydatabaseconnection.php";

class radiology
{
public $name;
public $price;
public $id;

static function retriveforgivelink()
{
    $DB=new database();
    $conn=$DB->DBC();
    echo"<label>Radiologies</label>";
    echo" <select name='rad'>";
    $sql4 = "SELECT  *  FROM `radiology` WHERE isdeleted = 'false'";
    $result4 = mysqli_query($conn, $sql4);
    if(mysqli_num_rows($result4) > 0){
      while($row = mysqli_fetch_array($result4))
     {
  ?>
          <option  value = "<?php echo $row['ID'];?>"> <?php echo $row['Name'];?> </option>  
 <?php 
 }
 ?>
          </select>
 
 <?php
 }


}

static function retriveradiology ()
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql4 = "SELECT  *  FROM `radiology` WHERE isdeleted = 'false'";
    $result4 = mysqli_query($conn, $sql4);
    if(mysqli_num_rows($result4) > 0){
      while($row = mysqli_fetch_array($result4))
     {
  ?>
          <h4  value = "<?php echo $row['ID'];?>"> <?php echo $row['Name'];?> </h4>  
 <?php 
 }
 ?>
        
 
 <?php
 }


}


static function addradiology ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "Insert INTO radiology (Name,price) values('$obj->name' ,'$obj->price')";
    mysqli_query($conn,$sql);
    echo "<script>alert('A New role  has been created')</script>";
    header("Location:radiologyCRUD.php");

}


static function editradiology ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "UPDATE radiology SET Name= '$obj->name' ,  price = '$obj->price' WHERE ID='$obj->id'";
    mysqli_query($conn,$sql);
    header("Location:radiologyCRUD.php");

}

static function deleteradiology ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $DB=new database();
    $conn=$DB->DBC();
    $sql="UPDATE radiology SET isdeleted='true'
    WHERE ID = $obj->id";
    mysqli_query($conn,$sql);   
    header("Location:radiologyCRUD.php");
}



}
?>