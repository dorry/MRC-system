<?php
require_once 'admin.php';
require_once 'schedule.php';


class adminview{


static function showformyres($lid)
{
  include("navbar.php");

  $result = user::selectuserformyres($lid);
  $length =  count($result);
  $result1 = user::selectformyres($lid);
  $length1 =  count($result1);
  $result2 = reserve::selectmyres($lid);
  $length2 = count($result2);
  $result3 = radiology::selectformyres($lid);
  $length3 = count($result3);
  
  echo "<h2>Patient Reservations</h2>";
  echo "<table width='65%' id = 'tbl'>";
  echo "<thead>
        <tr>
        <th>Doctor Name</th>         
        <th>Patient Name</th>         
        <th>Date</th>         
        <th>Radiology</th>         
        <th>Price</th>         
        </tr>
        </thead>
        <tbody>";
        
for ($i=0; $i<$length;$i++)
{
  $firstn=$result[$i]['firstname'];
  $lastn=$result[$i]['lastname']; 
  $firstn2=$result1[$i]['firstname'];
  $lastn2=$result1[$i]['lastname'];
  $Date = $result2[$i]['Date'];
  $Name = $result3[$i]['Name'];
  $Price = $result3[$i]['price'];
?>

<tr>
    <td>
        <?php echo $firstn; 
           echo " "; 
           echo $lastn?> 
    </td>
    <td>
       <?php echo $firstn2; 
           echo " "; 
           echo $lastn2?>  

    </td>
<td> <?php echo $Date; ?> 
</td>
<td> <?php echo $Name; ?> 
</td>
<td> <?php echo $Price; ?> 
</td>
</tr>

<?php

    }
    echo "</tbody>";
echo "</table>";
echo "<script>
$('#tbl').DataTable();
</script>";
  }
public static function showradiologydropdown()
    {
        echo"<label>Radiologies</label>";
        echo" <select name='rad'>";
        $result = radiology::retriveforgivelink();
        $length =  count($result);
        for ($i=0; $i<$length;$i++)
    {
            ?>
            <option value = "<?php echo $result[$i]['ID'];?>">
            <?php echo $result[$i]['Name'];?> 
            <?php echo  " " ;?> 
            <?php echo $result[$i]['price'];?> 
            </option>  
            <?php
        }
        ?>
        </select>
        <?php
}
public static function showeditradiologyform()
{
  ?>
  <input type="text" name="name" placeholder="type Rad name" required = ''/>
  <input type="number" name="price" min="1" placeholder="type Rad price" required = ''/>
  <input type="submit" value="Edit" name="doeditadminrad"/>
  <?php
}
public static function showcreateradiologyform()
{
  ?>
  <input type="text" name="name" placeholder="type Rad name" required = ''/>
  <input type="number" name="price" placeholder="type Rad price" required = ''/>
  <input type="submit" value="Create" name = "docreateadminrad"/>
  <?php
}

public static function showradiology()
{
  $result = radiology::retriveforgivelink();   
  $length =  count($result);
  echo "<table width='30%' id = 'tbl'>";
  echo "
  <thead>
  <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Price</th>
  </tr>
  </thead>
  <tbody>"; 
  for ($i=0; $i<$length;$i++)
  {
    ?>
    <tr>
    <td> <?php echo $result[$i]['ID'];?> </td>
    <td> <?php echo $result[$i]['Name'];?> </td>
    <td> <?php echo $result[$i]['price'];?> </td>
    <br>
    </tr>
    <?php
  }
    echo '</tbody>';
    echo "</table>";
    echo "<script>
    $('#tbl').DataTable();
    </script>";
}
public static function showuserdropdowneav($rid){

  $result = user::selectauserseav($rid);
  $length =  count($result);
  
    echo"<label>Users</label><span style= 'color:red;'>*</span>";
    echo" <select name='user' required = ''>";
  if ($length > 0){
     for ($i=0; $i<$length;$i++)
    { 
?>
    <option  value = "<?php echo $result[$i]['id'];?>">
                <?php 
                echo $result[$i]['firstname'];
                echo " "; 
                echo $result[$i]['lastname'];
                ?>
      </option>


<?php

}


  echo "</select>";
}
else {echo " No User Avaliabe";}
}

public static function showoptionsforeav($rid)
{
  $result = useroptions::selectUTO($rid);
  $length =  count($result);
  if ($length > 0)
  {
    for ($i=0; $i<$length;$i++)
    {
      ?>
      <label><?php echo $result[$i]['name']; ?></label>
      <input name="<?php echo $result[$i]['name']?>" 
      type="<?php echo $result[$i]['type']; ?>"> 
      <?php
    }
  }
  else 
  {
    echo " No Option Avaliabe";
  }
}

public static function showediteavtypeform()
{
  ?>
  <span id="users"></span>
  <br>
  <span id="form"></span>
  <input type="submit" name="eutd_submit">
  <?php
}

public static function showusertypedropdowneav()
{
  $result = usertype::selectallusertypes();
  $length =  count($result);
  echo"<label>Usertypes</label>";
  echo "<select name = 'roleid' onchange='getform(this.value)'>";
    for ($i=0; $i<$length;$i++)
    {
    ?>
    <option value = "<?php echo $result[$i]['id'];?>">
    <?php 
    echo $result[$i]['type'];
    ?>
    </option>
    <?php
    }
  echo "</select>";
 }

public static function showgiveform()
{
  ?>
  <input type="submit" name="dogiveoption" value="Add"/>
  <?php
}

public static function showeavtypeform()
{
  ?>
  <span id="users"></span>
  <br>
  <span id="form"></span>
  <input type="submit" name="utd_submit">
  <?php
}

public static function showeditoptionform()
{
  ?>
  <input type="text" name="new" placeholder="Type new option name" required = ''>
  <input type="submit" name="doeditoption" value="Edit" />

  <?php
}

public static function showoptiondropdown()
{
  $result = useroptions::selectalloptions();
  $length =  count($result);
  echo"<label>Options</label>";
  echo" <select name='option'>";
  for ($i=0; $i<$length;$i++)
  {
    ?>
    <option value = "<?php echo $result[$i]['id'];?>">
    <?php 
    echo $result[$i]['name'];
    ?>
    </option>
    <?php
  }
  echo "</select>";
}

public static function showdeleteoptionform()
{
  ?>
  <input type="submit" name="dodeleteoption" value="Delete"/>
  <?php
}


public static function showcreateoptionform()
{
  ?>
  <h3>Create Option</h3>
  <input type="text" name="name" placeholder="Type Option name" required = ''/>
  <input type="text" name="datatype" placeholder="Type it's datatype in capslock" required = ''/>
  <input type="submit" name="docreateoption" value="Create" />
  <?php
}

public static function ShowLinksdropdown()
{
  $result = links::retriveforgivelink();
  $length =  count($result);
  echo"<label>Links</label>";
  echo" <select name='link'>";
  for ($i=0; $i<$length;$i++)
  {
    ?>
    <option value = "<?php echo $result[$i]['id'];?>">
    <?php echo $result[$i]['linkname'];?>
    </option>  
    <?php
  }
echo "</select>";
}

public static function CreateLinkForm()
{
  ?>
  <input type="text" name="link" placeholder="type linkname" required = ''/>
  <input type="text" name="plink" placeholder="type physicalname" required = ''/>
  <input type="submit" value="Create" name="CreateAuthorize" />
  <?php
}



public static function deletetypeform ()
{
  ?>
  <input type="submit" name="dodeletetype" value="Delete"/>
  <?php
}

public static function edittypeform ()
{
  ?>
  <input type="text" name="newname" placeholder="Type the new usertype name" required = ''>
  <input type="submit" name="doedittype" value="Edit"/>
  <?php
}


public static function createtypeform ()
{
  ?>
  <h3>Add UserType</h3>
  <input type="text" name="name" placeholder="Type name" required = ''/>
  <input type="submit" name="docreatetype" value="Create" />
  <?php
}


public static function showusertypes()
{
  echo "<table width='30%' id = 'tbl'>";
  echo "<thead>
        <tr>
        <th>Usertype</th>
        <th>id</th>
        </tr>
        </thead>"; 
  $result = usertype::selectallusertypes();
  $length =  count($result);
  echo "<tbody>";
  for ($i=0; $i<$length;$i++)
  {
    ?>
    
    <tr>
    <td> <?php echo $result[$i]['type'];?> </td>
    <td> <?php echo $result[$i]['id'];?> </td>
    </tr>
    <?php
  }
  echo "</tbody>";
 echo "</table>";
 echo "<script>
 $('#tbl').DataTable();
 </script>";

}

public static function createdrsch()
  {
    ?>    <style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
    *:focus {
      outline: none;
    }

    body {
      margin: 0;
      padding: 0;
      font-size: 16px;
      color: #222;
      font-family: 'Roboto', sans-serif;
      font-weight: 300;
    }

    #login-box {
      position: relative;
      margin: 5% auto;
      width: 400px;
      height: 240px;
      border-radius: 2px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }

    .left {
      position: absolute;
      top: 0;
      left: 0;
      box-sizing: border-box;
      padding: 40px;
      width: 300px;
      height: 400px;
    }

    h1 {
      margin: 0 0 20px 0;
      font-weight: 300;
      font-size: 28px;
    }

    input[type="text"],
    input[type="password"] {
      display: block;
      box-sizing: border-box;
      margin-bottom: 20px;
      padding: 4px;
      width: 220px;
      height: 32px;
      border: none;
      border-bottom: 1px solid #AAA;
      font-family: 'Roboto', sans-serif;
      font-weight: 400;
      font-size: 15px;
      transition: 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      transition: 0.2s ease;
    }

    input[type="submit"] {
      margin-top: 28px;
      width: 120px;
      height: 32px;
      background:  linear-gradient(to right, #244cfd, #15e4fd);
      border: none;
      border-radius: 2px;
      color: #FFF;
      font-family: 'Roboto', sans-serif;
      font-weight: 500;
      text-transform: uppercase;
      transition: 0.1s ease;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="submit"]:focus {
      opacity: 0.8;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
      transition: 0.1s ease;
    }

    input[type="submit"]:active {
      opacity: 1;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
      transition: 0.1s ease;
    }

    .or {
      position: absolute;
      top: 180px;
      left: 280px;
      width: 40px;
      height: 40px;
      background: #DDD;
      border-radius: 50%;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
      line-height: 40px;
      text-align: center;
    }

    .right {
      position: absolute;
      top: 0;
      right: 0;
      box-sizing: border-box;
      padding: 40px;
      width: 300px;
      height: 400px;
      background: url('https://goo.gl/YbktSj');
      background-size: cover;
      background-position: center;
      border-radius: 0 2px 2px 0;
    }

    .right .loginwith {
      display: block;
      margin-bottom: 40px;
      font-size: 30px;
      color: black;
      text-align: center;
      font-weight: bold;
    }

    button.social-signin {
      margin-bottom: 20px;
      width: 220px;
      height: 36px;
      border: none;
      border-radius: 2px;
      color: #FFF;
      font-family: 'Roboto', sans-serif;
      font-weight: 500;
      transition: 0.2s ease;
      cursor: pointer;
    }

    button.social-signin:hover,
    button.social-signin:focus {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
      transition: 0.2s ease;
    }

    button.social-signin:active {
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
      transition: 0.2s ease;
    }

    button.social-signin.facebook {
      background: #32508E;
    }

    button.social-signin.twitter {
      background: #55ACEE;
    }

    button.social-signin.google {
      background: #DD4B39;
    }</style>
        <title>Create Role</title>
      </head>
      <body>

         <?php include("navbar.php");
                require_once("admincontroller.php");
           ?>
    <div id="login-box">
      <div class="left">
        <form action="admincontroller.php" method="POST">
          <h3>Assign working times</h3>
      <?php
    }

     public static function ShowDoctorNamesdropdown(){
            $result = user::retrivedoctorsforeditres();
            $length =  count($result);
            echo" <select name='doc' required = ''>";
            for ($i=0; $i<$length;$i++)
                {
        ?>
              <option  value = "<?php echo $result[$i]['id'];?>">
                        <?php 
                        echo $result[$i]['firstname'];
                        echo " "; 
                        echo $result[$i]['lastname'];
                        ?>
              </option>
        <?php 
       }
    echo "</select>";
}

public static function createdrsch2()
{
  ?>
  <label>Start time:</label><span style= "color:red;">*</span><br>
  <input type="time" name="ST" required = ''><br>
  <label>End time:</label><span style= "color:red;">*</span><br>
  <input type="time" name="ET" required = ''>
<input type="submit" name="createdrsch" value="Assign">
</form>  

<?php
}
public static function showuser()
{
     require_once 'navbar.php';

  if(!empty($_SESSION)){}
  else{header("Location:index.php");}
  echo "<table width='50%' id = 'tbl' >";
  echo "<thead>
        <tr>
        <th>ID</th>
        <th>First Name</th> 
        <th>Last Name</th>
        <th>User Name</th>
        <th style = 'display: none;'></th>
        <th>Action</th>
        </tr>
        </thead>"; 
  $result = user::selectallusers();
  $length =  count($result);
  echo "<tbody>";
  
  for ($i=0; $i<$length;$i++)
  {
    
    ?>
    <tr>
    <form method="post" action="admincontroller.php">
    <input style = "display:none;left:-200;top:-200 !important;" type="text" name="id" value="<?php echo $result[$i]['id'];?>"></td>
    <td> <?php echo $result[$i]['id'];?> </td>
    <td> <?php echo $result[$i]['firstname'];?> </td>
    <td> <?php echo $result[$i]['lastname'];?> </td>
    <td> <?php echo $result[$i]['username'];?> </td>
    <td style = 'display: none;'><input type="hidden" name="id" value="<?php echo $result[$i]['id'];?>"></td>
    <td> <input type="submit" value="Edit" name="EditProfile" class="template-btn"></td>
    </form>
    </tr>
    <?php
  }

  echo "</tbody>";
    echo "</table>";
    echo "<script>
    $('#tbl').DataTable();
    </script>";
   require_once 'footer.php';

}

public static function showuserdropdown()
{
  $result = user::selectallusers();
  $length =  count($result);
  echo"<label>Users</label>";
  echo" <select name='user'>";
  for ($i=0; $i<$length;$i++)
  {
    ?>
    <option  value = "<?php echo $result[$i]['id'];?>">
                <?php 
                echo $result[$i]['firstname'];
                echo " "; 
                echo $result[$i]['lastname'];
                ?>
      </option>
<?php
  }
  echo "</select>";
}

public static function showusertypedropdown()
{
  $result = usertype::selectallusertypes();
  $length =  count($result);
  echo" <select name='role'>";
  for ($i=0; $i<$length;$i++)
  {
    ?>
    <option value = "<?php echo $result[$i]['id'];?>">
              <?php 
              echo $result[$i]['type'];
              ?>
      </option>
    <?php
  }
  echo "</select>";
}
 

 public static function editschform()
 {
   require_once"schedule.php";
    $obj=unserialize($_SESSION['schedule']);
    echo'<label>Start Time</label><span style= "color:red;">*</span>
    <input type="hidden" name="id" value="'.$obj->id.'">
    <input type="time" name="ST" value="'.$obj->starttime.'" required = ""/><br><br>
    <label>E-mail</label><span style= "color:red;">*</span>
    <input type="time" name="ET" value="'.$obj->endtime.'" required = ""/><br><br>';
}


public static function showedituserform(){
  require_once"user.php";
  $obj=unserialize($_SESSION['user']);
  echo'<label>Username</label><span style= "color:red;">*</span>
    <input type="hidden" name="user" value="'.$obj->id.'">
    <input type="text" name="UName" placeholder="Username" value="'.$obj->username.'" required = ""/><span style= "font-size:10px;">Username must be bigger that 5 chars and contain only digits, letters and underscore.</span><br><br>
    <label>E-mail</label><span style= "color:red;">*</span>
    <input type="email" name="email" placeholder="E-mail" value="'.$obj->email.'" required = ""/><span style= "font-size:10px;"><br><br>E-mail should be like this format: example@gmail.com</span><br><br>
    <label>First Name</label><span style= "color:red;">*</span>
    <input type="text" name="firstname" placeholder="FirstName" value="'.$obj->firstname.'" required = ""/><span style= "font-size:10px;">First Name must contain letters and spaces only.</span><br><br>
    <label>Last Name</label><span style= "color:red;">*</span>
    <input type="text" name="lastname" placeholder="LastName" value="'.$obj->lastname.'" required = ""/><span style= "font-size:10px;">Last Name must contain letters and spaces only.</span><br><br>
    <label>Social Security Number</label><span style= "color:red;">*</span>
    <input type="number" min="0" name="ssn" placeholder="Social Security Number" value="'.$obj->socialnumber.'" required = ""/><br><br><span style= "font-size:10px;">Social Number Should be 14 digits.</span><br><br>
    <label>Password</label><span style= "color:red;">*</span>
    <input type="password" name="password" placeholder="Password" value="" required = ""/><span style= "font-size:10px;">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.</span><br><br>
    <label>Usertype</label><span style= "color:red;">*</span>';

}
public static function doctorsch()
{
  if(!empty($_SESSION)){}
  else{header("Location:index.php");}
  ?>
  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
  <?php
  $schedule = new schedule();
  $user = new user();
  $array = $schedule->selectall();
  $length =  count($array);
  $drnames = $user->selectdocssch();
  echo "<h2>Doctor schedules</h2>";
  echo "<table width='65%' id = 'tbl'>";
  echo " <thead>
          <tr>
          <th>Doctor Name</th>         
          <th>Start Time</th>         
          <th>End Time</th>            
        </tr>
        </thead>"; 
    echo "<tbody>";
   for ($i=0; $i<$length;$i++)
      { 
    ?>
    <form action="admincontroller.php" method="POST">
    <?php 
    $drfirstn=$drnames[$i]['firstname'];
    $drlastn=$drnames[$i]['lastname'];
    $start = $array[$i]['StartTime'];
    $end = $array[$i]['EndTime'];
    ?>
    <tr>
    <input type="hidden" name="ScheduleID" value="<?php echo $array[$i]['id'];?>">
    <td><?php echo $drfirstn; echo " "; echo $drlastn?> </td>
    <td><?php echo $start;?></td>
    <td><?php echo $end;?></td>
    <td> <input type="submit" name="EditSchedule" value="Edit"></td>
    </tr>
    </form>
    <?php
    }
    echo "</tbody>";
    echo "</table>";
    echo "<script>
    $('#tbl').DataTable();
    </script>";
}


public static function showdrpatientdropdown(){

    $result = user::selectdocforresview();
    $length =  count($result);
    $result1 = user::selectforresview();
    $length1 =  count($result1);
    $result2 = reserve::selectforviewadmin();
    $length2 = count($result2);
    $result3 = radiology::selectforadminview();
    $length3 = count($result3);
    // echo $length1;
        echo "<select name='reserve'>"; 
        for ($i=0; $i<$length;$i++)
        {   
    $drfirstn=$result[$i]['firstname'];
    $drlastn=$result[$i]['lastname'];
    $Pfirstn=$result1[$i]['firstname'];
    $Plastn=$result1[$i]['lastname'];
    $Date = $result2[$i]['Date'];
    $Name = $result3[$i]['Name'];
    $Price = $result3[$i]['price']; 
    ?>

    <option  value = "<?php echo $result2[$i]['ID'];?>">
                        <?php 
    echo $drfirstn; 
     echo " "; 
     echo $drlastn?> 

    <?php echo $Pfirstn; 
     echo " "; 
     echo $Plastn?> 

    <?php echo $Date; ?> 

    <?php echo $Name; ?> 

    <?php echo $Price; ?> 
              </option>


    <?php
    }
    echo "</select>";
}


static function adminpanel()
{
  if(!empty($_SESSION)){}
  else{header("Location:index.php");}

  include("navbar.php");
  ?>
  <div>
      <h2>Admin Options : </h2>
      <a href="userCRUD.php"> <h3>   - Manage Users </h3></a>
      <a href="drCRUD.php"> <h3>   - Manage Doctor Schedules </h3></a>
      <a href="Roles.php"> <h3>   - Manage Usertypes </h3></a>
      <a href="linkCRUD.php"> <h3>   - Manage Links </h3></a>
      <a href="UTD.php"> <h3>   - Manage Usertype details </h3></a>
      <a href="radiologyCRUD.php"> <h3>   - Manage Radiologies </h3></a>
      <a href="ReservationCRUD.php"> <h3>   - Manage Reservation </h3></a>
      <a href="AllEditablePages.php"> <h3>   - Editable pages </h3></a>
      <a href="Statistics.php"> <h3>   - Statistics page </h3></a>
  </div>
  <?php
  include("footer.php"); 
    }
    static function userCRUD()
    {
      if(!empty($_SESSION)){}
      else{header("Location:index.php");}
      require_once"user.php";
     if ( isset($_GET['success']) && $_GET['success'] == 1 )
     {

          user::ReturnMessages(1);
     }
     else if(isset($_GET['success']) &&$_GET['success'] == 0)
     {
      user::ReturnMessages(0);
     }
  ?>
    
  <?php
}

static function drCRUD()
{
  if(!empty($_SESSION)){}
  else{header("Location:index.php");}
  include("navbar.php"); 
  ?>
  <div>
    <h2>Admin Options : Manage Schedules </h2>
    <a href="createdrsch.php"> <h3> - create doctors schedule </h3></a>            
    <a href="viewdrsch.php">   <h3> - Show doctors schedule </h3></a>            
  </div>
  <?php
  require_once"user.php";
     if ( isset($_GET['success']) && $_GET['success'] == 1 )
     {

          user::ReturnMessages(1);
     }
     else if(isset($_GET['success']) &&$_GET['success'] == 0)
     {
      user::ReturnMessages(0);
     }
  include("footer.php"); 
}

static function roleCRUD()
{
  if(!empty($_SESSION)){}
  else{header("Location:index.php");}
  include("navbar.php"); 
  ?>
  <div>
    <h2>Admin Options : Manage Usertypes </h2>
    <a href="ViewType.php"> <h3>   - View all Roles </h3></a>
    <a href="createtype.php"> <h3>   - Create a new Role </h3></a>
    <a href="edittype.php"> <h3>   - Edit an existing Role </h3></a>
    <a href="deleteusertype.php"> <h3>   - Delete a Role </h3></a>
  </div>
  <?php
  include("footer.php"); 
}

static function linkCRUD()
{
  if(!empty($_SESSION)){}
  else{header("Location:index.php");}
  include("navbar.php"); 
  ?>
  <div>
    <h2>Admin Options : Manage Links </h2>
    <a href="createlink.php"> <h3>   - Create a whole new Link </h3></a> 
    <a href="Givelink.php"> <h3>     - Create role permissions </h3></a>
    <a href="Typelinks.php"> <h3>    - Change role permissions </h3></a>
    <a href="deletelink.php"> <h3>  -  Delete link </h3></a>
  </div>
  <?php
  include("footer.php"); 
}


static function UTD()
{
  if(!empty($_SESSION)){}
  else{header("Location:index.php");}
  include("navbar.php"); 
  ?>
  <div>
    <h2>Admin Options : Manage Usertype detailss </h2>
  <a href="createoption.php"> <h3>   - Create Option </h3></a>
  <a href="deleteoption.php"> <h3>   - Delete Option </h3></a>
  <a href="editoption.php"> <h3>   - Edit Option </h3></a>
  <a href="addoption.php"> <h3>   - Add option to Usertype </h3></a>
  <a href="modifyuser.php"> <h3>   - Add Usertype details to a certain user </h3></a>
  <a href="editUTD.php"> <h3>   - Edit Usertype details of a certain user </h3></a>
  </div>
  <?php
  include("footer.php"); 
}

static function radCRUD()
{
    if(!empty($_SESSION)){}
  else{header("Location:index.php");}
  include("navbar.php"); 
  ?>
<div>
  <h2>Admin Options : Manage Radiologies </h2>
<a href="viewradiology.php"> <h3>   - View all Radiologies </h3></a>
<a href="createrad.php"> <h3>   - Create a new Radiology </h3></a>
<a href="editrad.php"> <h3>   - Edit an existing Radiology </h3></a>
<a href="deleterad.php"> <h3>   - Delete a Radiology </h3></a>
</div>
  <?php
  include("footer.php"); 
}



static function resCRUD()
{
  if(!empty($_SESSION)){}
  else{header("Location:index.php");}
  include("navbar.php"); 
  ?>
<div>
  <h2>Admin Options : Manage Reservation </h2>
  <a href="ViewAllReservation.php"> <h3>   - Retrive/Delete All Reservation </h3></a>
  <a href="editreservation.php"> <h3>   - Edit Reservation </h3></a>
</div>
  <?php
  include("footer.php"); 
}

  public static function showdrpatient()
  {
    $result = user::selectdocforresview();
    $length =  count($result);
    $result1 = user::selectforresview();
    $length1 =  count($result1);
    $result2 = reserve::selectforviewadmin();
    $length2 = count($result2);
    $result3 = radiology::selectforadminview();
    $length3 = count($result3);
    //echo $length1;
    echo "<h2>Patient Reservations</h2>";
    echo "<table width='65%' id = 'tbl'>";
    echo "<thead>
          <tr>
          <th>Doctor Name</th>         
          <th>Patient Name</th>         
          <th>Date</th>         
          <th>Radiology</th>         
          <th>Price</th>
          <th>Action</th>    
          </tr>
          </thead>
          <tbody>";   
    for ($i=0; $i<$length;$i++)
    { 
      echo'<form action="admincontroller.php" method="POST">';
      $drfirstn=$result[$i]['firstname'];
      $drlastn=$result[$i]['lastname'];
      $Pfirstn=$result1[$i]['firstname'];
      $Plastn=$result1[$i]['lastname'];
      $Date = $result2[$i]['Date'];
      $Name = $result3[$i]['Name'];
      $Price = $result3[$i]['price'];
  ?>

  <tr>
  <td> <?php echo $drfirstn; 
            echo " "; 
            echo $drlastn?> 
  </td>
  <td> <?php echo $Pfirstn; 
            echo " "; 
            echo $Plastn?> 
  </td>
  <td> <?php echo $Date; ?> 
  </td>
  <td> <?php echo $Name; ?> 
  </td>
  <td> <?php echo $Price; ?> 
  </td>
  <input type="hidden" name="ReserveID" value="<?php echo $result2[$i]['ID'];?>">
  <td> <input type="submit" name="DeleteReservation" value="Delete"></td>
  </tr>
  </form>
  <?php
  }
    echo "</tbody>";
    echo "</table>";
    echo "<script>
      $('#tbl').DataTable();
      </script>";
}
}