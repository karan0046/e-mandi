<?php

$host="localhost";
$user="root";
$password="";
$db="login";

$mysqli =  mysqli_connect($host,$user,$password,$db);
# mysqli_select_db($db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $rpassword = $_POST['rpassword'];
    $email = $_POST['email'];

    
    $sql="SELECT * FROM `login_table` where username='".$uname."' limit 1";
    $insert="INSERT INTO `login_table` values ('".$uname."','".$password."')";
    
    $result=mysqli_query($mysqli,$sql);
    #$row = mysqli_fetch_array($result);
    $row = mysqli_num_rows($result);
    #$total = $row[0];
    #echo $result;

    if($password != $rpassword){
        echo '<script>alert("repeat password does not match")</script>';
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }
    else if($row == 1){
        echo '<script>alert("record exists")</script>';
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }
    else{
        mysqli_query($mysqli,$insert);
        echo '<script>alert("registered")</script>';
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }
       
}

?>