<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_site";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
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
            width: 90%;
            max-width: 800px;
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
</head>
<body>

    <div class='table-container'>
        <h2>All Students Data</h2>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Reg No</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>CGPA</th>
                    <th>Class</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['roll'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['regno'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['state'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['dob'] ?></td>
                        <td><?= $row['cgpa'] ?></td>
                        <td><?= $row['class'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p style='color: red;'>No students found in the database.</p>
        <?php endif; ?>
    </div>

</body>
</html>

<?php
$conn->close();
?>
