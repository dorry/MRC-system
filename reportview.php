<?php
require_once "user.php";
class reportview
{
    public static function showdropdownforpatients()
    {
        $result = user::showpatientsforreport();
        $length =  count($result);
        echo "<form  method='post' action = 'doctorcontroller.php'> ";
        echo "<div id='login-box'>";
        echo "<div class='left'>";
        echo" <h2> Create a report: </h2>";
        echo" <h4> Choose patient: </h4>";
        echo "<select name = 'patientreport' >";
        for ($i = 0; $i < $length; $i++)
		{

            echo "<option value='" . $result[$i]['id'] . "'>" . $result[$i]['firstname'] . " " .$result[$i]['lastname'] . "</option>";
        }
        echo "</select>";
    }
    public static function showradiologydropdown()
    {
        echo"<br><br><h4>Radiologies</h4>";
        echo" <select name='rad'>";
        $result = report::getradforreport();
        $length =  count($result);
        for ($i=0; $i<$length;$i++)
        {
            ?>
            <option value = "<?php echo $result[$i]['ID'];?>" required = "">
            <?php echo $result[$i]['Name'];?> 
            <?php echo  " " ;?> 
            </option>  
            <?php
        }
        ?>
        </select>
        <?php
    }
    public static function showreportform()
    {
        ?>
        <br><br>
        <h4>Technique: </h4>
        <textarea name = 'tech' rows = "3" cols = "60" placeholder="Type the technique" required = ""></textarea><br><br>
        <h4>Findings: </h4>
        <textarea name = 'find' rows = "6" cols = "80" placeholder = "Type the findings" required = ""></textarea><br><br>
        <h4>Opinion: </h4>
        <textarea name = 'opinion' rows = "3" cols = "60" placeholder="Type your opinion" required = ""></textarea>
        <input type = 'submit' name = "savereport" value = 'SAVE REPORT' >
        </form>
        </div>
        </div>
        <?php
    }
}
?>