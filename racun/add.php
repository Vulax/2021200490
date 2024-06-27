<?php
include '../config.php';
include '../templates/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vlasnik_jmbg = $_POST['vlasnik_jmbg'];
    $stanje = $_POST['stanje'];

    $sql = "INSERT INTO Racun (Vlasnik_JMBG, Stanje) VALUES ('$vlasnik_jmbg', '$stanje')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Novi nalog je uspešno kreairan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<form method="post" action="" class="mt-4">
    <div class="form-group">
        <label for="vlasnik_jmbg">JMBG Vlasnika:</label>
        <input type="text" class="form-control" name="vlasnik_jmbg" required>
    </div>
    <div class="form-group">
        <label for="stanje">Stanje:</label>
        <input type="number" class="form-control" name="stanje" required>
    </div>
    <button type="submit" class="btn btn-primary">Dodaj racun</button>
</form>

<?php include '../templates/footer.php'; ?>
