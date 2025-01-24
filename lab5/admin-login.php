<?php

$validUsername = "admin";
$validPassword = "admin123";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

 
    if ($username === $validUsername && $password === $validPassword) {
        echo "<h2 style='color: green; text-align: center;'>Login Successful! Welcome, $username.</h2><br/>";
        echo "<a href='studentreg.html' target='_blank'>Insert Student</a> <br/>";
        echo "<a href='update.html' target='_blank'>Update Student</a> <br/>";
        echo "<a href='delete.html' target='_blank'>Delete Student</a> <br/>";
    
    } else {
        echo "<h2 style='color: red; text-align: center;'>Invalid Username or Password.</h2>";
    }
}
?>
