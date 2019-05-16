<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	
<?php
if(isset($_POST["submit"]))
{
	require_once("tcpdf/tcpdf.php");


		require_once("tcpdf/tcpdf.php");
	$obj_pdf = new TCPDF('P' , PDF_UNIT , PDF_PAGE_FORMAT , true , 'UTF-8',false);
	$obj_pdf->SetCreator(PDF_CREATOR);
		$obj_pdf->AddPage();
	// $obj_pdf->SetTitle("Export");
	// $obj_pdf->SetHeaderData('','', PDF_HEADER_TITLE,PDF_HEADER_STRING);
	// $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '' , PDF_FONT_SIZE_MAIN));
	// $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_MAIN, '' , PDF_FONT_SIZE_MAIN));
	// $obj_pdf->SetDefaultMonospacedFont('helvetica');
	// $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	// $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
	// $obj_pdf->setPrintHeader(false);
	// $obj_pdf->setPrintFooter(false);
	// $obj_pdf->setAutoPageBreak(True,10);
	// $obj_pdf->SetFont('helvetica','',12);
	$content = "sgfsafa";
	$obj_pdf->writeHTML($content);
	ob_clean();
	$obj_pdf->Output("testpdf.php", "I");
}
?>
<form method="post">
<table>
	
<th>a7a</th>
<th>a7a2</th>
<th>a7a3</th>
</table>

<input type="submit" name="submit" value="sub">



</form>

</body>
</html>