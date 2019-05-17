<?php
session_start();
require_once "reservecontroller.php";
require_once "receptioncontroller.php";

include("navbar.php"); 
    $reserve= new reservecontroller();
    $reserve->showpatients();
    $recep = new receptionistcontroller();
    $recep->showinvoiceform();
    ?>

  </script>
  </body>

</html>
