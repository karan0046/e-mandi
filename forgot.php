<?php

#echo "working";

$host="localhost";
$user="root";
$password="";
$db="emandi";

$mysqli =  mysqli_connect($host,$user,$password,$db);
# mysqli_select_db($db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $rpass = $_POST['rpassword'];
    
    $sql1="SELECT * FROM `civilian` where aadhar_no='".$uname."' limit 1";
    $sql2="SELECT * FROM `farmer` where aadhar_no ='".$uname."' limit 1";
    $sql3="SELECT * FROM `retailler` where aadhar_no='".$uname."' limit 1";
    $sql4="SELECT * FROM `wholeseller` where aadhar_no='".$uname."' limit 1";
    
    $result1=mysqli_query($mysqli,$sql1);
    $result2=mysqli_query($mysqli,$sql2);
    $result3=mysqli_query($mysqli,$sql3);
    $result4=mysqli_query($mysqli,$sql4);
    #$row = mysqli_fetch_array($result);
    $row1 = mysqli_num_rows($result1);
    $row2 = mysqli_num_rows($result2);
    $row3 = mysqli_num_rows($result3);
    $row4 = mysqli_num_rows($result4);
    #$total = $row[0];
    #echo $result;

    
    
    if($rpass != $password){
        echo '<script>alert("repeat password does not match")</script>';
        echo "<script> window.location.assign('login.html'); </script>";
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }else if($row1 == 1){
        $sql1="UPDATE `civilian` set password = '".$password."' WHERE aadhar_no ='".$uname."'";
        mysqli_query($mysqli,$sql1);
        echo '<script>alert("password changed ")</script>';;
        echo "<script> window.location.assign('login.html'); </script>";
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }else if($row2 == 1){
        $sql1="UPDATE `farmer` set password = '".$password."' WHERE aadhar_no ='".$uname."'";
        mysqli_query($mysqli,$sql1);
        echo '<script>alert("password changed ")</script>';;
        echo "<script> window.location.assign('login.html'); </script>";
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }else if($row3 == 1){
        $sql1="UPDATE `retailler` set password = '".$password."' WHERE aadhar_no ='".$uname."'";
        mysqli_query($mysqli,$sql1);
        echo '<script>alert("password changed ")</script>';;
        echo "<script> window.location.assign('login.html'); </script>";
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }else if($row4 == 1){
        $sql1="UPDATE `wholeseller` set password = '".$password."' WHERE aadhar_no ='".$uname."'";
        mysqli_query($mysqli,$sql1);
        echo '<script>alert("password changed ")</script>';;
        echo "<script> window.location.assign('login.html'); </script>";
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }else {
        echo '<script>alert("record does not exists")</script>';;
        echo "<script> window.location.assign('login.html'); </script>";
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }
       
}


?>