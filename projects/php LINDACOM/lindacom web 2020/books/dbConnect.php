<?php
//define constants for local host and hosted online on 000webhost
$user = "epiz_21113631";
$password = "leader01";
$dbname = "epiz_21113631_books";
$dbhost = "sql105.epizy.com";

// Create connection
$connect = new mysqli($dbhost, $user, $password, $dbname);
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>