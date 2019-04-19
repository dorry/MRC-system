<?php 
require_once 'links.php';
require_once 'usertype.php';

class LinksView
{
public static function CreateLinkForm()
{
?>
<input type="text" name="link" placeholder="type linkname"/>
<input type="text" name="plink" placeholder="type physicalname" />
    <input type="submit" value="Create" name="CreateAuthorize" />

<?php
}
public static function ShowUserTypedropdown()
{
    $result = usertype::retriveforlinks();
	$length =  count($result);
 
    echo"<label>Usertypes</label>";
    echo" <select name='role'>";
    for ($i=0; $i<$length;$i++)
		{
    ?>
    <option value = "<?php echo $result[$i]['id'];?>"><?php echo $result[$i]['type'];?></option>
<?php 

}
echo "</select>";
echo"<br>";
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
            <option value = "<?php echo $result[$i]['id'];?>"> <?php echo $result[$i]['linkname'];?> </option>  
   <?php

}
echo "</select>";

}
}