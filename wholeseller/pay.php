<?php

//echo "working";

$cnum = $_POST['lastname'];
$cmonth = $_POST['month'];
$ccvv = $_POST['cvv'];
$chname = $_POST['firstname'];
$camount = $_POST['rs'];
$bname = $_POST['bank'];
$cardt = $_POST['card'];
$date = date('d F, Y (l)');
$time = date('h:i:s A');
$status = 0;

//echo $date , $time;

$host="localhost";
$user="root";
$password="";
$db="emandi";

$mysqli =  mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM `transaction`;";
$result=mysqli_query($mysqli,$sql);
$id = mysqli_num_rows($result) + 1;
//echo $id;
mysqli_free_result($result);


$insert="INSERT INTO `transaction` values ('".$id."','".$date."','".$time."','".$status."','".$cardt."','".$bname."','".$cnum."','".$cmonth."','".$ccvv."','".$chname."','".$camount."')";
mysqli_query($mysqli,$insert);
echo '<script>alert("Transaction Under Review ! Redirecting to homepage")</script>';
echo "<script> window.location.assign('start.html'); </script>";
mysqli_close($mysqli);
exit();


?>