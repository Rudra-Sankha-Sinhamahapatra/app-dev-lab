<?php

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "school_site";   


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $roll = $_POST['roll'];
    $regno = $_POST['regno'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $cgpa = $_POST['cgpa'];


    $sql = "INSERT INTO students (roll, regno, name, address, state, gender, dob, cgpa) 
            VALUES ('$roll', '$regno', '$name', '$address', '$state', '$gender', '$dob', '$cgpa')";


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
