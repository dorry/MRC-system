<?php

class doctorview
{
    public static function showpateints()
    {
        $result = doctor::getreportsforview();
        $doctor = new doctor();
        $result2 = $doctor->getpatientsforview($result);
        $length =  count($result2);
        $id = 0;
        for ($i = 0; $i < $length; $i++)
		{
            
            $id = $result[$i]['id'];
            ?>
            <a href="showreport.php?id=<?php echo $id; ?>"> <h3> <?php echo  "- ". $result2[$i]['firstname'] . " " . $result2[$i]['lastname'] . " " . $result[$i]['date'] ; ?> </h3></a>
            <?php
        }
    }
    public static function showreport($id)
    {
        $result = doctor::showpatientreport($id);
        echo" <h3> Patient name: <h4>$result[0]</h4></h3>";
        echo" <h3> Doctor name: <h4>$result[1]</h4></h3>";
        echo" <h3> Radiology : <h4>$result[2]</h4></h3>";
        echo" <h3> Technique: <h4>$result[3]</h4></h3>";
        echo" <h3> Findings: <h4>$result[4]</h4></h3>";
        echo" <h3> Opinion: <h4>$result[5]</h4></h3>";

    }
}
?>