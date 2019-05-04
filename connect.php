<?php

$localhost ="localhost";
$user = "root@localhost";
$password = "";

$con = mysqli_connect($localhost,$user,$password);
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>




?>