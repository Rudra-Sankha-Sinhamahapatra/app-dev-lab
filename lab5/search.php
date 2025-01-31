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
            $student = $result->fetch_assoc(); 

            echo "
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .form-container {
                    background: white;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    width: 400px;
                    text-align: center;
                }
                .form-container input, .form-container button {
                    width: 100%;
                    padding: 10px;
                    margin: 10px 0;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
                .form-container .update-btn {
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        padding: 10px;
        margin: 5px;
        width: 48%;
    }
    .form-container .update-btn:hover {
        background-color: #218838;
    }
    .form-container .cancel-btn {
        background-color: #dc3545;
        color: white;
        border: none;
        cursor: pointer;
        padding: 10px;
        margin: 5px;
        width: 48%;
    }
    .form-container .cancel-btn:hover {
        background-color: #c82333;
    }
            </style>

            <div class='form-container'>
                <form action='update.php' method='POST'>
                    <input type='hidden' name='roll' value='{$student['roll']}'>
                    <h2>Update Student</h2>
                    <input type='text' name='name' value='{$student['name']}' placeholder='Name' required>
                    <input type='text' name='regno' value='{$student['regno']}' placeholder='Registration No' required>
                    <input type='text' name='address' value='{$student['address']}' placeholder='Address'>
                    <input type='text' name='state' value='{$student['state']}' placeholder='State'>
                    <input type='text' name='gender' value='{$student['gender']}' placeholder='Gender'>
                    <input type='date' name='dob' value='{$student['dob']}' placeholder='Date of Birth'>
                    <input type='number' step='0.01' name='cgpa' value='{$student['cgpa']}' placeholder='CGPA'>
                    <input type='text' name='class' value='{$student['class']}' placeholder='Class'>
                    <button type='submit' class='update-btn'>Update</button>
                    <button type='reset' class='cancel-btn'>Cancel</button>
                </form>
            </div>
            ";
        } else {
            echo "<h2 style='color: red; text-align: center;'>No student found with Roll Number $roll.</h2>";
        }
    } else {
        echo "<h2 style='color: red; text-align: center;'>Roll Number cannot be empty.</h2>";
    }
}

$conn->close();
?>
