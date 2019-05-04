<?php
session_start();


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

 if (mysqli_query($con,"CREATE DATABASE IF NOT EXISTS project_test"))
    {
        echo "";
    }
    else
    {
        echo "Error creating database: " . mysqli_error($con);
    }
	
    $db = mysqli_select_db($con,'project_test');
	
if(mysqli_query($con,"CREATE Table IF NOT EXISTS user_login (username VARCHAR(20)  PRIMARY KEY,  userpass VARCHAR(20) NOT NULL)"))
    {
        echo "";
    }
    else
    {
        echo "Error creating table: " . mysqli_error($con);
    }
	$nameErr = '';
	$passErr = '';
	
	
	if(isset($_POST['submit']))
	{
	  $username = '';
	  $userpass = '';
	  
	  
	  if (empty($_POST["username"]))
	  {
    $nameErr = "Email is required";
     } else {
    $username = $_POST["username"];
	
	
   
   if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $nameErr = "Only letters and white space allowed"; 
    }
	
	$_SESSION['myValue'] = $username; 
    }
  
   if (empty($_POST["userpass"]))
   {
    $passERR = "Password is required";
	}
	else
	{
	 $userpass = $_POST['userpass'];
	   if (!preg_match('',$userpass)) {
      $passErr = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"; 
    }  
	 }
	  
	
	
	if(mysqli_query($con,"INSERT INTO user_login(username,userpass) VALUES('$username','$userpass')"))
    {
        header('Location: imageuploade.php');
    }
    else
    {
        echo "error in inserting data: " . mysqli_error($con);
    }
	
	
	
	}
	

?>


<form    action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="POST">

<div  id="container">
<input type="text" name="username" placeholder="Enter user name...." pattern="(^[a-zA-Z ]*)" title="only letter and white spaces" required/>
<span class="error">* <br/><?php echo $nameErr;?></span>

</div>
<div id="container">
<input type="password" name="userpass" placeholder="Enter user Password...." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
<span class="error">* <br><?php echo $passErr;?></span>
</div>
<div id="container">
<button type="submit"  name="submit">Login</button>
</div>

</form>



</body>
</html>