<?php
include"mydatabaseconnection.php";

class usertype
{
public $type;
public $id;


static function retriveforeav(){

    $DB=new database();
    $conn=$DB->DBC();
    echo"<label>Usertypes</label>";
   echo "<select name = 'roleid' onchange='getform(this.value)'>";
    $query = "SELECT  *  FROM `usertype` WHERE ID>'1'";
    $result = mysqli_query($conn, $query);
    echo"<label >Usertypes</label>";
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
       {
    ?>
            <option value = "<?php echo $row['id'];?>"><?php echo $row['type'];?></option>
      <?php 
        }
        echo "</select>";
        echo "<br>";

   ?>
   
   <?php
   }



}

static function retriveforlinks(){

    $DB=new database();
    $conn=$DB->DBC();
    echo"<label>Usertypes</label>";
    echo" <select name='role'>";
    $query = "SELECT  *  FROM `usertype` WHERE ID>'0' AND isdeleted='false'";
    $result = mysqli_query($conn, $query);
    echo"<label >Usertypes</label>";
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
       {
    ?>
            <option value = "<?php echo $row['id'];?>"><?php echo $row['type'];?></option>
      <?php 
        }
        echo "</select>";
        echo "<br>";

   ?>
   
   <?php
   }



}

static function retrive()
{
    $DB=new database();
    $conn=$DB->DBC();
    $query = "SELECT * from usertype WHERE isdeleted='false'" ;
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
       {
    ?>
   
            <h4 value = "<?php echo $row['id'];?>"> <?php echo $row['id'];  echo '     '; 
             echo $row['type'];
   
            ?> </h4>  
   <?php 
   }
   ?>
   
   <?php
   }


}

static function addusertype($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "Insert INTO usertype (type) values('$obj->type')";
    mysqli_query($conn,$sql);
    echo "<script>alert('A New role  has been created')</script>";
    header("Location:index.php");
}


static function editusertype ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    
	$sql="UPDATE usertype
		  SET type= '$obj->type'
		  WHERE id = $obj->id;";
    mysqli_query($conn,$sql);
    header("Location:Roles.php");

}

static function deleteusertype ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


}
?>