<?php

session_start();
$servername = "localhost";
$username = "id8878100_root";
$password = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(isset($_POST['signin_submit']))
{ 
    $sql = "select * from user where
     username = '" . $_POST["username"] . "' and 
     Password = '" . $_POST["password"] . "'";
     $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_array($result))
    {
        echo "<script>alert('Selected sucess')</script>";
  		$typeId = $row["usertypeid"];
        $_SESSION["FirstName"] = $row["firstname"];
        $_SESSION["LastName"] = $row["lastname"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["Password"] = $row["password"];
        $_SESSION["ID"] = $row["id"];
        $sql2="SELECT * FROM `usertypelinks` WHERE typeId = $typeId";
        $result2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_array($result2))
        {
        	$linkId = $row2["linkid"];
            $sql3="SELECT * FROM `links` WHERE id = $linkId";
            $result3 = mysqli_query($conn, $sql3);
            if($row3 = mysqli_fetch_array($result3))
            {
                $_SESSION['link'] = $row3["physicallink"];
                $_SESSION['pagename'] = $row3["linkname"];
            }
        }
        echo $_SESSION["link"];
        header("Location:index.php");
    }
    else
    {
        header("Location:signin.html");
        echo "<script>alert('Invalid username or password')</script>";
    }
}


?>