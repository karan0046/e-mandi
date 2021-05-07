<?php

//echo "working";

$rname = $_POST['name'];
$ral = $_POST['aadhar_no'];
$rphone = $_POST['phone'];
$rmes = $_POST['message'];

$host="localhost";
$user="root";
$password="";
$db="emandi";

$mysqli =  mysqli_connect($host,$user,$password,$db);
$sql="INSERT INTO `complaints` values ('".$rname."','".$ral."','".$rphone."','".$rmes."')";
mysqli_query($mysqli,$sql);
echo "<script> window.location.assign('index.html'); </script>";
mysqli_close($mysqli);
exit();



?>