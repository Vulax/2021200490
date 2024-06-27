<?php
include '../config.php';
include '../templates/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $stanje = $_POST['stanje'];

    $sql = "UPDATE Racun SET Stanje='$stanje' WHERE ID='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Account updated successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Racun WHERE ID='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<form method="post" action="" class="mt-4">
    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
    <div class="form-group">
        <label for="stanje">Stanje:</label>
        <input type="number" class="form-control" name="stanje" value="<?php echo $row['Stanje']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Ažuriraj Račun</button>
</form>

<?php include '../templates/footer.php'; ?>
