<?php

//echo "working";

$ad = $_POST['Addhaar'];
$name = $_POST['name'];
$category = $_POST['category'];
$item = $_POST['bank1'];
$ph = $_POST['Mobile'];
$addr = $_POST['Address'];
$price = $_POST['Price'];
$quan = $_POST['Quantity'];
/*
<option value="dem">Select your crop name</option>
            <option value="sbi">Rice</option>
            <option value="hdfc">Wheat</option>
            <option value="BoB">Maize</option>
            <option value="PNB">Lentils</option>
            <option value="icici">Onion</option>
            <option value="other">Potato</option>
            <option value="dem">Turmeric</option>
            <option value="sbi">Apple</option>
            <option value="hdfc">Grapes</option>
            <option value="BoB">Bringal</option>
            <option value="PNB">Orange</option>
            <option value="icici">Cauliflower</option>
            <option value="other">Cashew</option>
*/
if($item == "sbi"){
    $item = "Rice";
}else if($item == "hdfc"){
    $item = "Wheat";
}else if($item == "Bob"){
    $item = "Maize";
}else if($item == "PNB"){
    $item = "Lentils";
}else if($item == "icici"){
    $item = "Onion";
}else if($item  == "other"){
    $item = "Potato";
}


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


$insert="INSERT INTO `add_request` values ('".$ad."','".$name."','".$category."','".$item."','".$ph."','".$addr."','".$price."','".$quan."')";
mysqli_query($mysqli,$insert);
echo '<script>alert("Wait untill Admin reviews your request")</script>';
echo "<script> window.location.assign('start.html'); </script>";
mysqli_close($mysqli);
exit();


?>