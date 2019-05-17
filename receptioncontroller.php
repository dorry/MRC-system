<?php
require_once "receptionist.php";
require_once "receptionistview.php";
require_once "reserve.php";

if(isset($_POST["GenerateInvoice"]))
{

	$reserve = new reserve();
	$reserve->checkoutpatient($_POST['patientreport']);
	require_once("tcpdf/tcpdf.php");
	$model = new receptionist();
	$P = $model->viewpatientinvoice($_POST['patientreport']);
	$obj_pdf = new TCPDF('P' , PDF_UNIT , PDF_PAGE_FORMAT , true , 'UTF-8',false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$obj_pdf->AddPage();
	 $obj_pdf->SetTitle("Export");
	 $obj_pdf->SetHeaderData('','', PDF_HEADER_TITLE,PDF_HEADER_STRING);
	 $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '' , PDF_FONT_SIZE_MAIN));
	 $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_MAIN, '' , PDF_FONT_SIZE_MAIN));
	 $obj_pdf->SetDefaultMonospacedFont('helvetica');
	 $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	 $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
     	$obj_pdf->setPrintHeader(false);
		$obj_pdf->setPrintFooter(false);
	 $obj_pdf->setAutoPageBreak(True,10);
	 $obj_pdf->SetFont('helvetica','',12);
	$obj_pdf->writeHTML("<html>".$P."</html>" , true , 0 , true , 0);
	ob_clean();
	$obj_pdf->Output("testpdf.pdf", "I");
}

class receptionistcontroller
{
	static function viewinvoice($pid)
	{
		$model = new receptionist();
		$model->viewpatientinvoice($pid);
	}

    static  function showinvoiceform()
	{
		$view = new receptionistview();
		$view->invoiceform();
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