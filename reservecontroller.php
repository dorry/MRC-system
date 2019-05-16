<?php
require_once "reserve.php";
require_once "reserveview.php";
//require_once "CreateReserve.php";
require_once "doctor.php";
require_once "admin.php";
require_once "patient.php";
require_once "session.php";
if(isset($_POST['addreserve']))
{
	$reserve = new reserve();
	$reservesend = new reserve();
	$reserve->patientId=$_SESSION['ID'];
	$reserve->doctorId=$_POST['doctor'];
	$reserve->date=$_POST['date']." ".$_POST['time'];
	$reservesend->addreserve($reserve);
	//header("Location:reservation.php");
}

class reservecontroller
{

	static  function showpatients()
	{
		$view = new reserveview();
		$view->showdropdownforpatients();
	}
	static  function selectforadminview()
	{
		$model = new reserve();
		$model->selectforviewadmin();
	}
	static  function viewreserveform()
	{
		$model = new reserveview();
		$model->addreserveform();
	}
	static  function viewreservedropdowndoc($doc)
	{
		$model = new reserveview();
		$model->addreservedropdowndoc($doc);
	}
	static  function viewreservedropdownrad()
	{
		$model = new reserveview();
		$model->addreservedropdownradiology();
	}

	static  function showdocdropdown()
	{
		$model = new reserveview();
		$model->showdocdropdown();
	}

	
}
?>