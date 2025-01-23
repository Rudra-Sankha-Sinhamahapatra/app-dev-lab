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

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the roll number from POST request
    $roll = $_POST['roll'];

    // Check if roll number is set
    if (!empty($roll)) {
        // Prepare the SQL query
        $sql = "SELECT * FROM students WHERE roll = '$roll'";

        $result = $conn->query($sql);

        // Check if a record was found
        if ($result->num_rows > 0) {
            // Output the student data
            while($row = $result->fetch_assoc()) {
                echo "Roll: " . $row["roll"]. " - Name: " . $row["name"]. " - CGPA: " . $row["cgpa"]. "<br>";
            }
        } else {
            echo "No student found with roll number: $roll";
        }
    } else {
        echo "Please provide a roll number.";
    }
}

// Close the connection
$conn->close();
?>
