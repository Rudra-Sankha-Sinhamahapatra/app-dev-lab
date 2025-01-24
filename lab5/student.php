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

    if (!empty($roll)) {
 
        $sql = "SELECT * FROM students WHERE roll = '$roll'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
       
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


$conn->close();
?>
