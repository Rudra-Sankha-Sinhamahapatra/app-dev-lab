<?php
// Database configuration
$servername = "localhost"; // Default server
$username = "root";        // Default username for XAMPP
$password = "";            // Default password for XAMPP (empty)
$dbname = "school_site";   // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $roll = $_POST['roll'];
    $regno = $_POST['regno'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $cgpa = $_POST['cgpa'];

    // Prepare SQL statement to insert data into the `students` table
    $sql = "INSERT INTO students (roll, regno, name, address, state, gender, dob, cgpa) 
            VALUES ('$roll', '$regno', '$name', '$address', '$state', '$gender', '$dob', '$cgpa')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
