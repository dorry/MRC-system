<?php

class doctorview
{
    public static function showpateints()
    {
        if(!empty($_SESSION)){}
        else{header("Location:index.php");}
        ?>
          <h2>Reports  : Select Patient : </h2>
          <table width='75%'>
          <tr>
          <th>Patient name</th>
          <th>Date & Time</th>
        </tr>
        <?php
        $result = doctor::getreportsforview();
        $doctor = new doctor();
        $result2 = $doctor->getpatientsforview($result);
        $length =  count($result2);
        $id = 0;
        for ($i = 0; $i < $length; $i++)
		{
            $id = $result[$i]['id'];
            ?>
            <tr>
            <td> <b><a href="showreport.php?id=<?php echo $id;?>">  
                <?php echo  "- ". $result2[$i]['firstname'] . " " . $result2[$i]['lastname'] . " " ; ?>
            </b></a></td>
            <td><?php echo $result[$i]['date'] ; ?> </td>
            </tr>
            <?php
        }
        echo "</table>";
    }
    
    public static function showdoctors()
    {
        $result = doctor::getreportsforviewp();
        $doctor = new doctor();
        $result2 = $doctor->getdoctorsforview($result);
        $length =  count($result2);
        $id = 0;

        for ($i = 0; $i < $length; $i++)
		{
            
            $id = $result[$i]['id'];
            ?>
            <a href="showreport.php?id=<?php echo $id; ?>"> 
                <h3> <?php echo  "- ". $result2[$i]['firstname'] . " " . $result2[$i]['lastname'] . " " . $result[$i]['date'] ; ?> </h3></a>
            <?php
        }
    }
    public static function showreport($id)
    {
        if(!empty($_SESSION)){  }
        else{header("Location:index.php");}
        ?>
        <div>
        <h2>Report : </h2>
        <br>
        <?php
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