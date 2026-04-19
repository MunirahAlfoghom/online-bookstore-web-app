<?php
// Database connection settings
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'bookstore';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>