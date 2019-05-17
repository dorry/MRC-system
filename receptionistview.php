<?php
require_once "receptionist.php";
class receptionistview
{

public function invoiceform()
{

	?>
	<style type="text/css">
		
input[type="submit"] {
  margin-top: 28px;
  width: 300px;
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
	</style>
	<span id="users"></span>
	<br>
	<span id="form"></span>
	</div>
	      <input type="submit" name="GenerateInvoice" value="Get Invoice and Check patient out" />

	</form>
	<?php  include("footer.php");?>
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
	<?php
}




}
?>