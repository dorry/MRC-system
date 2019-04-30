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
	$reserve->date=$_POST['date']." ".$_POST['time'].":00";
	$reservesend->addreserve($reserve);
}
	

class reservecontroller
{

	static function addobserver()
	{
		$model = new reserve();
		$dr = new doctor();
		$admin = new admin();
		$pat = new patient();
		$model->add($dr);
		$model->add($admin);
		$model->notify();
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
	static  function viewreservedropdowndoc()
	{
		$model = new reserveview();
		$model->addreservedropdowndoc();
	}
	static  function viewreservedropdownrad()
	{
		$model = new reserveview();
		$model->addreservedropdownradiology();
	}
}
?>