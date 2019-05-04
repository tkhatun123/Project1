<?php
session_start();
$id = $_SESSION['myValue'];
echo 'image gallery of ';
echo $id;

?>
<html>

<head>
<link href="css/style.css"  rel="stylesheet" type="text/css">
</head>
<style>
form {
  border: 3px solid #f1f1f1;
  max-width:100%;
  height:100%;
  text-align:center;
  padding:100px;
}
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 25%;
  padding: 20px;
}


.row{
  width:100%;
}
</style>

<body>
<?php

$localhost ="localhost";
$user = "root@localhost";
$password = "";

$con = mysqli_connect($localhost,$user,$password);
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "";

$db = mysqli_select_db($con,'project_test');

$res = mysqli_query($con,"SELECT *FROM multiple where id = '$id'");
echo '<html>

<body>

  <div class="row">';
while($row = mysqli_fetch_array($res))
{
echo
'<div class="column"><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" style="width:100%"/></div>';
}
echo '</div>

</body>
</html>'
;



?>

</body>
</html>

</html>