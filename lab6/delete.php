<?php

$host = "localhost";  
$username = "root";   
$password = "";      
$dbname = "school_site";   


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll = $_POST['roll'] ?? '';

  
    if (!empty($roll)) {

        $stmt = $conn->prepare("DELETE FROM students WHERE roll = ?");
        $stmt->bind_param("s", $roll);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<h2 style='color: green; text-align: center;'>Student with Roll Number $roll has been deleted successfully.</h2>";
            } else {
                echo "<h2 style='color: red; text-align: center;'>No student found with Roll Number $roll.</h2>";
            }
        } else {
            echo "<h2 style='color: red; text-align: center;'>Failed to delete the student. Please try again later.</h2>";
        }

        $stmt->close();
    } else {
        echo "<h2 style='color: red; text-align: center;'>Roll Number cannot be empty.</h2>";
    }
}


$conn->close();
?>
