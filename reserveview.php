<?php
class reserveview
{

    public static function addreservedropdowndoc()
    {
        echo "<form  method='post' action = 'reservecontroller.php'> ";
        echo "<div id='login-box'>";
        echo "<div class='left'>";
        echo" <h2> Make a reservation: </h2>";
        echo" <h4> Choose doctor: </h4>";
        echo "<select name = 'doctor'>";
        $result = reserve::reserveadddropdopselectdoctor();
		$length =  count($result);
        for ($i=0; $i<$length;$i++)
		{
            echo "<option value='" . $result[$i]['id'] . "'> Dr. " . $result[$i]['firstname'] . " " .$result[$i]['lastname'] . "</option>";
        }
        echo "</select>";
    }
        public static function addreserveform()
    {
        $date=date('Y-m-d');
        echo"<br> Reservation date:";
        echo"<br> <input type='date' name = 'date' min='$date'  max='2022-01-01'/><br>";
        echo"<br> <input type='time' name = 'time'/>";
        echo " <br> <input type='submit' name='addreserve' value='Submit' />";
        echo "</div>";
        echo "</div>";
        echo "</form>";
    }
    public static function addreservedropdownradiology()
    {
        echo" <h4>Choose radiology type: </h4>";
        echo "<select name = 'radiology'>";
        $result = reserve::reserveadddropdopselectradiology();
		$length =  count($result);
        for ($i=0; $i<$length;$i++)
		{
            echo "<option value='" . $result[$i]['ID'] . "'>" . $result[$i]['Name'] . "</option>";
        }
        echo "</select>";
    }
}
?>