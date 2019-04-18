<?php 
require_once 'useroptions.php';
require_once"mydatabaseconnection.php";
class useroptionsview
{


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

public static function showeavtypeform(){
?>
<span id="users"></span>
<br>
<span id="form"></span>
<input type="submit" name="utd_submit">

<?php
}
public static function showgiveform(){
?>
       <input type="submit" name="dogiveoption" value="Add"/>


<?php
}
public static function showeditform(){
?>
    <input type="text" name="new" placeholder="Type new option name">
    <input type="submit" name="doeditoption" value="Edit" />

<?php
}


public static function showdeleteform(){
?>
 <input type="submit" name="dodeleteoption" value="Delete"/>
<?php
}

public static function showcreateform(){
?>
     <h3>Create Option</h3>
    <input type="text" name="name" placeholder="Type Option name" />
    <input type="text" name="datatype" placeholder="Type it's datatype in capslock" />
    <input type="submit" name="docreateoption" value="Create" />
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




}
