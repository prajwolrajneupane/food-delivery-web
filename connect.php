<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "joinnow";
$conn = new mysqli($server, $username, $password, $database);

if($conn->connect_error){
    die("Failed to connect to DB: " . $conn->connect_error);
}
?>
