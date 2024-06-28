<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['jmbg'])) {
    $jmbg = $_GET['jmbg'];
    $sql = "SELECT * FROM Racun WHERE Vlasnik_JMBG='$jmbg'";
    $result = $conn->query($sql);
    $accounts = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { //Punjenje racuna
            $accounts[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($accounts);
}
