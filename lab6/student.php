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

        echo "
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
            .table-container {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                width: 80%;
                max-width: 600px;
                text-align: center;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }
            th, td {
                padding: 10px;
                border: 1px solid #ddd;
            }
            th {
                background-color: #007bff;
                color: white;
            }
            td {
                background-color: #f9f9f9;
            }
        </style>

        <div class='table-container'>
            <h2>Student Details</h2>
        ";

        if ($result->num_rows > 0) { 
            echo "<table>
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Reg No</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>CGPA</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['roll']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['regno']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['state']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['cgpa']}</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p style='color: red;'>No student found with roll number: $roll</p>";
        }

        echo "</div>";
    } else {
        echo "<p style='color: red; text-align: center;'>Please provide a roll number.</p>";
    }
}

$conn->close();
?>
