<?php

$servername = "localhost";
$username = "root";
$password = "";
$my_db = "robot";
$port ='3306';

// Create connection
$conn = mysqli_connect($servername, $username, $password,$my_db,$port);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$mo1 = $_REQUEST['m1'];
$mo2 = $_REQUEST['m2'];
$mo3 = $_REQUEST['m3'];
$mo4 = $_REQUEST['m4'];
$mo5 = $_REQUEST['m5'];
$mo6 = $_REQUEST['m6'];


if(isset($_POST['save'])){
$sql = "INSERT INTO `arm`(`m1`, `m2`, `m3`, `m4`, `m5`, `m6`) VALUES ('$mo1','$mo2','$mo3','$mo4','$mo5','$mo6')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}


if(isset($_POST['run'])){
$sql2 = "SELECT `m1`, `m2`, `m3`, `m4`, `m5`, `m6` FROM `arm` WHERE 1";
$result=mysqli_query($conn, $sql2);


if($result){
    if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
    echo "motor1 = " .$row['m1']. "<br>". "motor2 = " .$row["m2"]. "<br>". "motor3 = " .$row["m3"]. "<br>".
    "motor4 = " .$row["m4"]. "<br>". "motor5 = " .$row["m5"]. "<br>". "motor6 = " .$row["m6"]. "<br>";

}}
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}

mysqli_close($conn);
?>
