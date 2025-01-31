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
    $name = $_POST['name'];
    $regno = $_POST['regno'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $cgpa = $_POST['cgpa'];
    $class = $_POST['class'];

    if (!empty($roll)) {
    
        $sql = "UPDATE students 
                SET name = '$name', regno = '$regno', address = '$address', 
                    state = '$state', gender = '$gender', dob = '$dob', cgpa = '$cgpa',class = '$class'
                WHERE roll = '$roll'";

        if ($conn->query($sql) === TRUE) {
            echo "<h2 style='color: green; text-align: center;'>Student data updated successfully!</h2>";
        } else {
            echo "<h2 style='color: red; text-align: center;'>Error: " . $conn->error . "</h2>";
        }
    } else {
        echo "<h2 style='color: red; text-align: center;'>Roll Number cannot be empty.</h2>";
    }
}

$conn->close();
?>
