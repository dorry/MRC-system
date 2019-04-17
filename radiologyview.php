<?php
require_once "radiology.php";
class radiologyview
{
    public static function showcreateradiologyform()
    {
        ?>
        <input type="text" name="name" placeholder="type Rad name"/>
        <input type="text" name="price" placeholder="type Rad price"/>
        <input type="submit" value="Authorize" name = "docreateadminrad"/>
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
    public static function showradiologydropdown()
    {
        echo"<label>Radiologies</label>";
        echo" <select name='rad'>";
        $result = radiology::retriveforgivelink();
        $length =  count($result);
        for ($i=0; $i<$length;$i++)
		{
            ?>
            <option  value = "<?php echo $result[$i]['ID'];?>"> <?php echo $result[$i]['Name'];?> </option>  
            <?php
        }
        ?>
        </select>
        <?php
    }
    public static function showradiology()
    {
        $result = radiology::retriveforgivelink();   
        $length =  count($result);
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
    }
}
?>