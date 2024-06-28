<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banka";

// Kreairanje konekcije
$conn = new mysqli($servername, $username, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Neuspešna konekcija: " . $conn->connect_error);
}
?>