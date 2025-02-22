<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "DPPAM";
$conn = new mysqli(
    $host,
    $user,
    $pass,
    $db
);

// Checking for connections
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>