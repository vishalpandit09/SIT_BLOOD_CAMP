<?php

$host = 'localhost'; 
$dbname = 'blood_donation'; 
$username = 'root'; 
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullName = trim($_POST['fullName']);
    $dob = trim($_POST['dob']);
    $department = trim($_POST['department']);
    $mobile = trim($_POST['mobile']);
    $bloodgroup = trim($_POST['bloodgroup']);

 
    $sql = "INSERT INTO donors (fullName, dob, department, mobile, bloodgroup) 
    VALUES ('$fullName', '$dob', '$department', '$mobile', '$bloodgroup')";

        
    if (mysqli_query($conn, $sql)) {
        echo "Successfully registered!";
    } 
    
    else {
    echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>