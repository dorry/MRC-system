<?php
include"mydatabaseconnection.php";

class usertype
{
public $type;
public $id;

static function retrive()
{
    $DB=new database();
    $conn=$DB->DBC();
    $query = "SELECT * from usertype";
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


}

static function deleteusertype ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


}
?>