<?php
include '../config.php';

$id = $_GET['id'];
$sql = "DELETE FROM Racun WHERE ID='$id'";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Account deleted successfully")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>