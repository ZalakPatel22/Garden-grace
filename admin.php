<?php
$servername = "localhost";
$username = "root"; // change this to your MySQL username
$password = ""; // change this to your MySQL password
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
