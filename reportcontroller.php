<?php
require_once "reportview.php";
require_once "report.php";

class reportcontroller
{
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