<?php
require_once 'admin.php';


class adminview{


static function showformyres($lid){

    $result = user::selectuserformyres($lid);
    $length =  count($result);
    $result1 = user::selectformyres($lid);
    $length1 =  count($result1);
    $result2 = reserve::selectmyres($lid);
    $length2 = count($result2);
    $result3 = radiology::selectformyres($lid);
    $length3 = count($result3);
    
 echo "<h2>Patient Reservations</h2>";
        echo "<table width='65%'>";
    echo "<tr>
          <th>Doctor Name</th>         
          <th>Patient Name</th>         
          <th>Date</th>         
          <th>Radiology</th>         
          <th>Price</th>         
          </tr>";   
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
echo "</table>";
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
        <input type="text" name="name" placeholder="type Rad name"/>
        <input type="text" name="price" placeholder="type Rad price"/>
        <input type="submit" value="Edit" name="doeditadminrad"/>
        <?php
    }
public static function showcreateradiologyform()
    {
        ?>
        <input type="text" name="name" placeholder="type Rad name"/>
        <input type="text" name="price" placeholder="type Rad price"/>
        <input type="submit" value="Create" name = "docreateadminrad"/>
        <?php
}

public static function showradiology()
    {
        $result = radiology::retriveforgivelink();   
        $length =  count($result);
          echo "<table width='30%'>";
          echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        </tr>"; 
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
         echo "</table>";

}
public static function showuserdropdowneav($rid){


  $result = user::selectauserseav($rid);
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

public static function showoptionsforeav($rid){

  $result = useroptions::selectUTO($rid);
  $length =  count($result);
  if ($length > 0){
      for ($i=0; $i<$length;$i++)
    {
?>
  <input name="<?php echo $result[$i]['name']?>" 
         type="<?php echo $result[$i]['type']; ?>" 
         placeholder="Type<?php echo $result[$i]['name']; ?>"> 
<?php
}
}
else {

echo " No Option Avaliabe";

}
}

public static function showediteavtypeform(){
?>
<span id="users"></span>
<br>
<span id="form"></span>
  <input type="submit" name="eutd_submit">

<?php
}
public static function showusertypedropdowneav(){

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


public static function showgiveform(){
?>
       <input type="submit" name="dogiveoption" value="Add"/>


<?php
}

public static function showeavtypeform(){
?>
<span id="users"></span>
<br>
<span id="form"></span>
<input type="submit" name="utd_submit">

<?php
}

public static function showeditoptionform(){
?>
    <input type="text" name="new" placeholder="Type new option name">
    <input type="submit" name="doeditoption" value="Edit" />

<?php

}
public static function showoptiondropdown(){
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


public static function showdeleteoptionform(){
?>
 <input type="submit" name="dodeleteoption" value="Delete"/>
<?php
}


public static function showcreateoptionform(){
?>
     <h3>Create Option</h3>
    <input type="text" name="name" placeholder="Type Option name" />
    <input type="text" name="datatype" placeholder="Type it's datatype in capslock" />
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
<input type="text" name="link" placeholder="type linkname"/>
<input type="text" name="plink" placeholder="type physicalname" />
    <input type="submit" value="Create" name="CreateAuthorize" />

<?php
}

public static function deletetypeform ()
{

?>
         <input type="submit" name="dodeletetype" value="Delete"/>
<?php

}



public static function edittypeform (){

?>
   
       <input type="text" name="newname" placeholder="Type the new usertype name">
       <input type="submit" name="doedittype" value="Edit"/>

<?php

}


public static function createtypeform (){

?>
   <h3>Add UserType</h3>
    <input type="text" name="name" placeholder="Type name" />
    <input type="submit" name="docreatetype" value="Create" />

<?php

}


public static function showusertypes(){
  echo "<table width='30%'>";
  echo "<tr>
        <th>Usertype</th>
        <th>id</th>
        </tr>"; 
        $result = usertype::selectallusertypes();
        $length =  count($result);
        for ($i=0; $i<$length;$i++)
    {
?>
<tr>
<td> <?php echo $result[$i]['type'];?> </td>
<td> <?php echo $result[$i]['id'];?> </td>
</tr>
<?php
 }
 echo "</table>";
}

 public static function ShowDoctorNamesdropdown(){
        $result = user::retrivedoctorsforeditres();
        $length =  count($result);
        echo" <select name='doc'>";
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

public static function showuser(){
  echo "<table width='30%'>";
  echo "<tr>
        <th>Firstname</th>
        <th>Lastname</th> 
        <th>id</th>
        </tr>"; 
    $result = user::selectallusers();
    $length =  count($result);
    for ($i=0; $i<$length;$i++)
    {
?>
<tr><td> <?php echo $result[$i]['id'];?> </td>
<td> <?php echo $result[$i]['firstname'];?> </td>
<td> <?php echo $result[$i]['lastname'];?> </td></tr>

<?php

    }   
    echo "</table>";
  }

public static function showuserdropdown(){


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

public static function showusertypedropdown(){

  $result = usertype::selectallusertypes();
  $length =  count($result);
 
    echo"<label>Usertypes</label>";
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
 

public static function showedituserform(){
?>
  <label>Username</label>
    <input type="text" name="UName" placeholder="Username" />
    <label>email</label>
    <input type="text" name="email" placeholder="E-mail" />
    <label>password</label>
    <input type="password" name="password" placeholder="Password"/>
    <label>Usertype</label>
<?php
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

public static function showdrpatient(){

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
        echo "<table width='65%'>";
    echo "<tr>
          <th>Doctor Name</th>         
          <th>Patient Name</th>         
          <th>Date</th>         
          <th>Radiology</th>         
          <th>Price</th>         
          </tr>";   
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

<?php
}
            echo "</table>";
}

}