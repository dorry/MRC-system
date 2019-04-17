<?php 
require_once 'useroptions.php';
class useroptionsview
{

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
