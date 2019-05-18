<?php
// session_start();

require_once "doctor.php";
// require_once "doctorcontroller.php";
require_once "SharedFacadeUserAndDoctor.php";
if (empty($_SESSION)) { header("Location:index.php"); }
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

  <?php
  // $doc = new doctorcontroller();
  // $doc->viewpatients();
  $doc= new SharedFacade();
  $doc->Doctor->viewpatients();
  ?>
</div>




    <!-- Footer Area Starts -->
    <?php include("footer.php"); ?>
    <!-- Footer Area End -->
    <!-- Javascript -->
  </body>
</html>
