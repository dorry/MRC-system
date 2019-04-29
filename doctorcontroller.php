<?php
require_once "doctor.php";
require_once "doctorcontroller.php";
require_once "doctorview.php";
require_once "report.php";
require_once "session.php";

if(isset($_POST['savereport']))
{
    $report = new report();
    $doctor = $_SESSION['ID'];
    $patient = $_POST['patientreport'];
    $radiology = $_POST['rad'];
    $technique = $_POST['tech'];
    $findings = $_POST['find'];
    $opinion = $_POST['opinion'];

    $report->docid = $doctor;
    $report->patid = $patient;
    $report->radid = $radiology;
    $report->technique = $technique;
    $report->findings = $findings;
    $report->opinion = $opinion;
    $doctor = new doctor();
    $doctor->writepatientreport($report);
}

class doctorcontroller
{
    static  function viewpatients()
	{
		$view = new doctorview();
		$view->showpateints();
    }
    static  function viewdoctors()
	{
		$view = new doctorview();
		$view->showdoctors();
    }
    static  function viewreport($id)
	{
		$view = new doctorview();
		$view->showreport($id);
    }
    
}
?>