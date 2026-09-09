<?php
$servername = "localhost";
$username = "root";  // Change this if your MySQL user is different
$password = "";
$database = "flower_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
