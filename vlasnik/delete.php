<?php
include '../config.php';

$jmbg = $_GET['jmbg'];
$sql = "DELETE FROM Vlasnik WHERE JMBG='$jmbg'";

if ($conn->query($sql) === TRUE) {
    echo "Vlasnik uspešno obrisan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
