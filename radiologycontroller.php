<?php
require_once 'radiology.php';
require_once 'radiologyview.php';

class radiologycontroller
{
    static  function viewcreateradform()
	{
        $view = new radiologyview();
        $view->showcreateradiologyform();
    }
    static  function vieweditradform()
	{
        $view = new radiologyview();
        $view->showeditradiologyform();
    }
    static  function viewradiologydropdown()
	{
        $view = new radiologyview();
        $view->showradiologydropdown();
    }
    static  function viewradiologytable()
	{
        $view = new radiologyview();
        $view->showradiology();
    }
}

?>