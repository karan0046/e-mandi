<?php


$rname = $_POST['name'];
$runame = $_POST['username'];
$rpass = $_POST['password'];
$ral = $_POST['aadhar_no'];
$rgen = $_POST['gender'];
$rsname = $_POST['shopname'];
$rphone = $_POST['phone'];
$radd = $_POST['address'];
$rrole = $_POST['role'];

/*
0 - male
1 - female

1 - civillian
2 - farmer
3 - retailler
4 - wholeseller

*/

$host="localhost";
$user="root";
$password="";
$db="emandi";

$mysqli =  mysqli_connect($host,$user,$password,$db);
# mysqli_select_db($db);

if(isset($rrole)){
    if($rrole == 2){
        $sql="SELECT * FROM `farmer` where  aadhar_no ='".$ral."' limit 1";
        $result=mysqli_query($mysqli,$sql);
        $row = mysqli_num_rows($result);

        if($rgen == 0){
            $rgen = "male";
        }else{
            $rgen = "female";
        }
        $insert="INSERT INTO `farmer` values ('".$ral."','".$runame."','".$rpass."','".$rname."','".$radd."','".$rphone."','".$rgen."')";
        if($row == 1){
            echo '<script>alert("record exists")</script>';
            echo "<script> window.location.assign('register.html'); </script>";
            mysqli_free_result($result);
            mysqli_close($mysqli);
            exit();
        }else{
            mysqli_query($mysqli,$insert);
            echo '<script>alert("registered")</script>';
            echo "<script> window.location.assign('role.html'); </script>";
            mysqli_free_result($result);
            mysqli_close($mysqli);
            exit();
        }

    }else if ( $rrole == 1){
        //echo "working 1";
        $sql="SELECT * FROM `civilian` where  aadhar_no ='".$ral."' limit 1";
        $result=mysqli_query($mysqli,$sql);
        $row = mysqli_num_rows($result);

        if($rgen == 0){
            $rgen = "male";
        }else{
            $rgen = "female";
        }
        $insert="INSERT INTO `civilian` values ('".$ral."','".$runame."','".$rpass."','".$rname."','".$radd."','".$rphone."','".$rgen."')";
        if($row == 1){
            echo '<script>alert("record exists")</script>';
            echo "<script> window.location.assign('register.html'); </script>";
            mysqli_free_result($result);
            mysqli_close($mysqli);
            exit();
        }else{
            mysqli_query($mysqli,$insert);
            echo '<script>alert("registered")</script>';
            echo "<script> window.location.assign('login.html'); </script>";
            mysqli_free_result($result);
            mysqli_close($mysqli);
            exit();
        }
    }else if($rrole == 3){
        //echo "working 3";
        $sql="SELECT * FROM `retailler` where  aadhar_no ='".$ral."' limit 1";
        $result=mysqli_query($mysqli,$sql);
        $row = mysqli_num_rows($result);

        if($rgen == 0){
            $rgen = "male";
        }else{
            $rgen = "female";
        }
        $insert="INSERT INTO `retailler` values ('".$ral."','".$runame."','".$rpass."','".$rname."','".$radd."','".$rphone."','".$rgen."','".$rsname."')";
        if($row == 1){
            echo '<script>alert("record exists")</script>';
            echo "<script> window.location.assign('register.html'); </script>";
            mysqli_free_result($result);
            mysqli_close($mysqli);
            exit();
        }else{
            mysqli_query($mysqli,$insert);
            echo '<script>alert("registered")</script>';
            echo "<script> window.location.assign('login.html'); </script>";
            mysqli_free_result($result);
            mysqli_close($mysqli);
            exit();
        }
    }else if ($rrole == 4){
        //echo "working 4";
        $sql="SELECT * FROM `wholeseller` where  aadhar_no ='".$ral."' limit 1";
        $result=mysqli_query($mysqli,$sql);
        $row = mysqli_num_rows($result);

        if($rgen == 0){
            $rgen = "male";
        }else{
            $rgen = "female";
        }
        $insert="INSERT INTO `wholeseller` values ('".$ral."','".$runame."','".$rpass."','".$rname."','".$radd."','".$rphone."','".$rgen."','".$rsname."')";
        if($row == 1){
            echo '<script>alert("record exists")</script>';
            echo "<script> window.location.assign('register.html'); </script>";
            mysqli_free_result($result);
            mysqli_close($mysqli);
            exit();
        }else{
            mysqli_query($mysqli,$insert);
            echo '<script>alert("registered")</script>';
            echo "<script> window.location.assign('login.html'); </script>";
            mysqli_free_result($result);
            mysqli_close($mysqli);
            exit();
        }
    }
}else{
    echo '<script>alert("choose role")</script>';
    echo "<script> window.location.assign('register.html'); </script>";
}


?>