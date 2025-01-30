<?php
$servername = "localhost";
$username = "root"; 
$password = "Surya_Sr_4";  
$dbname = "user_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
