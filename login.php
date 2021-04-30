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
    
    $sql1="SELECT * FROM `civilian` where username='".$uname."'AND password='".$password."' limit 1";
    $sql2="SELECT * FROM `farmer` where username='".$uname."'AND password='".$password."' limit 1";
    $sql3="SELECT * FROM `retailler` where username='".$uname."'AND password='".$password."' limit 1";
    $sql4="SELECT * FROM `wholeseller` where username='".$uname."'AND password='".$password."' limit 1";
    
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

    if($row1 == 1 || $row2 == 1 ||$row3 == 1 ||$row4 == 1  ){
        //echo '<script>alert("succesfully logged in")</script>';
        echo "<script> window.location.assign('role.html'); </script>";
        //header('Location: login.html');
        mysqli_free_result($result);
        mysqli_close($mysqli);
        exit();
    }
    else{
        
        echo '<script>alert("Incorrect username or password")</script>';;
        echo "<script> window.location.assign('login.html'); </script>";
        mysqli_free_result($result);
        mysqli_close($mysqli);
        //header('Location: login.html');
        
        exit();
        
    }
       
}


?>