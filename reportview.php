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
        echo"<h4>Radiologies</h4>";
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
        <h4>Technique: </h4>
        <input type='text' name = 'tech' placeholder="Type the technique" required = "">
        <h4>Findings: </h4>
        <input type='textarea' name = 'find' placeholder="Type the findings" required = "">
        <h4>Opinion: </h4>
        <input type='text' name = 'opinion' placeholder="Type your opinion" required = "">
        <input type = 'submit' name = "savereport" value = 'SAVE REPORT' >
        <?php
    }
}
?>