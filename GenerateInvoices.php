<?php
session_start();
if(!empty($_SESSION)){}
else{header("Location:index.php");}
require_once "reservecontroller.php";
?>
  <head>
  </head>
  <body>
<?php include("navbar.php"); ?>
<div>
  <?php
    $reserve= new reservecontroller();
    $reserve->showpatients();
  ?>
<span id="users"></span>
<br>
<span id="form"></span>
</div>


    <?php include("footer.php"); ?>
<script type="text/javascript">
function getinvoice(val){
  var xhttp;
  if (val.length == 0) { 
    document.getElementById("form").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("form").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "getinvoice.php?e="+val, true);
  xhttp.send();  
}
  </script>
  </body>

</html>
