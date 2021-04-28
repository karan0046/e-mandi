<?php

#echo "working";

$host="localhost";
$user="root";
$password="";
$db="login";

$mysqli =  mysqli_connect($host,$user,$password,$db);
# mysqli_select_db($db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM `login_table` where username='".$uname."'AND password='".$password."' limit 1";
    
    $result=mysqli_query($mysqli,$sql);
    #$row = mysqli_fetch_array($result);
    $row = mysqli_num_rows($result);
    #$total = $row[0];
    #echo $result;

    if($row == 1){
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