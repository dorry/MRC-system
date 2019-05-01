<?php 
require_once "Subject.php";
require_once "doctor.php";
require_once "patient.php";
require_once "admin.php";

class subjectcontroller
{
static function notifyobservers()
{
	$model = new subject();
	$dr = new doctor();
	$admin = new admin();
	$pat = new patient();
	$model->add($dr);
	$model->add($admin);
	$model->notify();
}
}
?>