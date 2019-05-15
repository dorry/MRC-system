<?php
require_once "receptionist.php";
require_once "receptionistview.php";

class receptionistcontroller
{


	static function viewinvoice($pid)
	{
		$model = new receptionist();
		$model->viewpatientinvoice($pid);
	}
    static  function viewrepatientsdropdowndoc()
	{
		$view = new reportview();
		$view->showdropdownforpatients();
    }
    static  function viewraddropdowndoc()
	{
		$view = new reportview();
		$view->showradiologydropdown();
    }
    static  function viewformreport()
	{
		$view = new reportview();
		$view->showreportform();
    }
}
?>