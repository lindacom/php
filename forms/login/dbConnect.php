<?php
//define constants for local host 
$user = "useraccount";
$password = "password";
$dbname = "database";
$dbhost = "hostname";

// Create connection
$connect = new mysqli($dbhost, $user, $password, $dbname);
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
