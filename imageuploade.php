<?php
session_start();
$id = $_SESSION['myValue'];
echo'Hello  ';
echo $_SESSION['myValue'];
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

</style
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
if(mysqli_query($con,"CREATE Table IF NOT EXISTS  multiple(
  id VARCHAR(255) NOT NULL  ,
  name VARCHAR(255) NOT NULL,
  image LONGBLOB NOT NULL
  
)"))
    {
        echo "";
    }
    else
    {
        echo "Error creating table: " . mysqli_error($con);
    }
	
	
	
	if(isset($_POST["submit"]))
	{

$filename = $_FILES['img']['name'];
$file_tmp = $_FILES['img']['tmp_name'];
$filetype = $_FILES['img']['type'];
$filesize = $_FILES['img']['size'];
for($i=0; $i<=count($file_tmp); $i++){
if(!empty($file_tmp[$i])){
$name = addslashes($filename[$i]);
 
$temp = addslashes(file_get_contents($file_tmp[$i]));

if(mysqli_query($con,"Insert into multiple(id,name,image) values('$id','$name','$temp')")){
header('Location: display.php');
}
else{
echo "failed";
echo "<br />";
}
}
}
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
<div id="container">
<input multiple="" name="img[]" type="file" />
</div><br/>
<button name="submit" >Submit</button>
</form>
</body>
</html>