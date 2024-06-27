<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banka";

// Kreairanje konekcije
$conn = new mysqli($servername, $username, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>