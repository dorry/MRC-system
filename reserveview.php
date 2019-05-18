<?php
require_once "receptionist.php";

class reserveview
{
    public static function showdropdownforpatients()
    {
        $result = receptionist::showpatientsforinvoice();
        $length =  count($result);
        echo "<form  method='post' action = 'receptioncontroller.php'> ";
        echo "<div id='login-box'>";
        echo "<div class='left'>";
        echo" <h2> Generate Invoice: </h2>";
        echo" <h4> Choose patient: </h4>";
        echo "<select name = 'patientreport' onchange='getinvoice(this.value)' >";
        echo "<option> </option>";
        for ($i = 0; $i < $length; $i++)
        {

            echo "<option value='" . $result[$i]['id'] . "'>" . $result[$i]['firstname'] . " " .$result[$i]['lastname'] . "</option>";
        }
        echo "</select>";
    }
    public static function addreservedropdowndoc($doc)
    {
        echo" <br>Choose doctor:<br>";
        echo "<select name = 'doctor'>";
        $result = reserve::reserveadddropdopselectspecificdoctor($doc);
        // echo $result[$i]['DocId'];
         $length =  count($result);
        for ($i=0; $i<$length;$i++)
        {
        // $result2 = reserve::doctorsavailable($result[$i]['DocId']);
        echo "<option value='" . $result[$i]['DocId'] . "'> Dr. " . $result[$i]['firstname'] . " " .$result[$i]['lastname'] . "</option>";
        }
        echo "</select><br>";
    }
    public static function addreserveform()
    {
        if(!empty($_SESSION)){}
        else{header("Location:index.php");}
        ?>
        <?php include("navbar.php"); ?>

        <style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);

        *:focus {
          outline: none;
        }

        body {
          margin: 0;
          padding: 0;
          font-size: 16px;
          color: #222;
          font-family: 'Roboto', sans-serif;
          font-weight: 300;
        }

        #login-box {
          position: relative;
          margin: 5% auto;
          width: 600px;
          height: 480px;
          border-radius: 2px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .left {
          position: absolute;
          top: 0;
          left: 0;
          box-sizing: border-box;
          padding: 40px;
          width: 600px;
          height: 400px;
        }

        h1 {
          margin: 0 0 20px 0;
          font-weight: 300;
          font-size: 28px;
        }

        input[type="text"],
        input[type="password"] {
          display: block;
          box-sizing: border-box;
          margin-bottom: 20px;
          padding: 4px;
          width: 220px;
          height: 32px;
          border: none;
          border-bottom: 1px solid #AAA;
          font-family: 'Roboto', sans-serif;
          font-weight: 400;
          font-size: 15px;
          transition: 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
          transition: 0.2s ease;
        }

        input[type="submit"] {
          margin-top: 28px;
          width: 120px;
          height: 32px;
          background:  linear-gradient(to right, #244cfd, #15e4fd);
          border: none;
          border-radius: 2px;
          color: #FFF;
          font-family: 'Roboto', sans-serif;
          font-weight: 500;
          text-transform: uppercase;
          transition: 0.1s ease;
          cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="submit"]:focus {
          opacity: 0.8;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
          transition: 0.1s ease;
        }

        input[type="submit"]:active {
          opacity: 1;
          box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
          transition: 0.1s ease;
        }

        .or {
          position: absolute;
          top: 180px;
          left: 280px;
          width: 40px;
          height: 40px;
          background: #DDD;
          border-radius: 50%;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
          line-height: 40px;
          text-align: center;
        }

        .right {
          position: absolute;
          top: 0;
          right: 0;
          box-sizing: border-box;
          padding: 40px;
          width: 300px;
          height: 400px;
          background: url('https://goo.gl/YbktSj');
          background-size: cover;
          background-position: center;
          border-radius: 0 2px 2px 0;
        }

        .right .loginwith {
          display: block;
          margin-bottom: 40px;
          font-size: 30px;
          color: black;
          text-align: center;
          font-weight: bold;
        }

        button.social-signin {
          margin-bottom: 20px;
          width: 220px;
          height: 36px;
          border: none;
          border-radius: 2px;
          color: #FFF;
          font-family: 'Roboto', sans-serif;
          font-weight: 500;
          transition: 0.2s ease;
          cursor: pointer;
        }

        button.social-signin:hover,
        button.social-signin:focus {
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
          transition: 0.2s ease;
        }

        button.social-signin:active {
          box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
          transition: 0.2s ease;
        }

        button.social-signin.facebook {
          background: #32508E;
        }

        button.social-signin.twitter {
          background: #55ACEE;
        }

        button.social-signin.google {
          background: #DD4B39;
        }</style>

        <?php
        echo "<form  method='post' action = 'reservecontroller.php'> ";
        $date=date('Y-m-d');
        echo "<div id='login-box'>";
        echo "<div class='left'>";
        echo" <h2> Make a reservation: </h2>";
        echo"<br> Reservation date:";
        echo"<br> <input type='date' name = 'date' min='$date'  max='2022-01-01' required = ''/><br>";
        echo"<br> Time:";
        echo"<br> <input type='time' name = 'time' step='600' onchange='getdoctor(this.value)'/><br>";
      
        ?>

        <script type="text/javascript">
        function getdoctor(val)
        {
          var xhttp;
          if (val.length == 0)
          { 
            document.getElementById("doctorname").innerHTML = "";
            return;
          }
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (this.readyState == 4 && this.status == 200) 
            {
              document.getElementById("doctorname").innerHTML = this.responseText;
            }
          };
          xhttp.open("POST", "getdoctor.php?doctors="+val, true);
          xhttp.send();  
        }
        
        </script>
        <?php
}
    public static function addreservedropdownradiology()
    {
        echo" <br>Choose radiology type: <br>";
        echo "<select name = 'radiology'>";
        $result = reserve::reserveadddropdopselectradiology();
		$length =  count($result);
        for ($i=0; $i<$length;$i++)
		{
            echo "<option value='" . $result[$i]['ID'] . "'>" . $result[$i]['Name'] . "</option>";
        }
        echo "</select>";
        echo " <br> <input type='submit' name='addreserve' value='Submit' />";
        echo "</div>";
        echo "</div>";
        echo "</form>";
    }

    public static function showdocdropdown()
    {
        ?>
        <span id="doctorname"></span>
        <?php
    }
}
?>