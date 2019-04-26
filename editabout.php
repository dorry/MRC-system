<?php
echo'<html>
<head>
        <meta charset="utf-8">
        <title>CKEditor</title>
        <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
</head>
<body>
';
require_once"mydatabaseconnection.php";
$DB=database::getinstance();

$result=$DB->query("static","id=1");


    if($row = mysqli_fetch_array($result))
   {    echo "<form method = 'Post'>";
        echo"<pre> <textarea name = 'editor1' style ='width:100%;height:100%'  >";
        echo  htmlspecialchars($row['content']);
      echo "</textarea>";
       echo" </pre> ";
       echo "<input type = 'submit' name = 'submit' value = 'Apply Changes'>";
       echo "</form >";
    }
    
    if(isset($_POST['submit'])){
    $code = $_POST['editor1'];
    $code=$DB->ckeditor($code);
    $applyChangesQuery=$DB->updatequery("static","content", "'$code'","id =1");
    }
echo'<script>
var editor = CKEDITOR.replace( "editor1" );
editor.config.allowedContent = true;
</script>
</body>
</html>';
?>

                