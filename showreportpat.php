<?php
// session_start();

require_once "doctor.php";
require_once "doctorcontroller.php";
require_once "SharedFacadeUserAndDoctor.php";
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}
?>
  <head>
  </head>
  <body>
    <!-- Preloader Starts -->
    <!-- Preloader End -->
    <!-- Header Area Starts -->
    <?php include("navbar.php"); ?>
    <!-- Header Area End -->
    <!-- Banner Area Starts -->

<div>
  <h2>Reports  : Select Doctor : </h2>
  <table width='35%'>
    <tr>
          <th>Doctor name</th>
          <th>Date</th>
          <th>Time</th>
          </tr>
          </table>
  <?php
  $doc= new SharedFacade();
  $doc->Doctor->viewdoctors();
  // $doc = new doctorcontroller();
  // $doc->viewdoctors();

  ?>
</div>


  

    <!-- Banner Area End -->
    <!-- Welcome Area Starts -->
    <!-- Welcome Area End -->
    <!-- Patient Area Starts -->
    <!-- Patient Area Starts -->




    <!-- Footer Area Starts -->
    <?php include("footer.php"); ?>
    <!-- Footer Area End -->
    <!-- Javascript -->
  </body>
</html>
