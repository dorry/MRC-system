<?php
session_start();
include"ReportingModuleClass.php";
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}
?>
  <head>
    <title>Admin Panel</title>
  </head>
  <body>
    <?php include("navbar.php"); ?>
<div>
<h2>Radiology Statistics</h2>
<?php
$report = new report();
$dataPoints = array();
$dataPoints =  $report->retriveradiology();
?>
 <head>  
 
 </head>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>


</div>


  

    <?php include("footer.php"); ?>
</body>
<script>
window.onload = function ()
{
    var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    title:{
        text: "Average Radiology type reservations"
    },
    
    data: [{
        type: "pie",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - #percent%",
        // yValueFormatString: "฿#,##0",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
</html>
