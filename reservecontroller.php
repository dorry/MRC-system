<?php
require_once "reserve.php";
require_once "reserveview.php";
require_once "CreateReserve.php";

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