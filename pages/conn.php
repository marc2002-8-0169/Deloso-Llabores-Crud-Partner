<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "test";

$conn = new mysqli($server,$username,$password,$database);

if ($conn->connect_error) {
    die("C[onnection failed: " . $conn->connect_error);
}

?>