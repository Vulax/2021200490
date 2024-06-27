<?php
include '../config.php';
include '../templates/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmbg = $_POST['jmbg'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $adresa = $_POST['adresa'];

    $sql = "INSERT INTO Vlasnik (JMBG, Ime, Prezime, Adresa) VALUES ('$jmbg', '$ime', '$prezime', '$adresa')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Novi vlasnik je uspešno dodat</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<form method="post" action="" class="mt-4">
    <div class="form-group">
        <label for="jmbg">JMBG:</label>
        <input type="text" class="form-control" name="jmbg" required>
    </div>
    <div class="form-group">
        <label for="ime">Ime:</label>
        <input type="text" class="form-control" name="ime" required>
    </div>
    <div class="form-group">
        <label for="prezime">Prezime:</label>
        <input type="text" class="form-control" name="prezime" required>
    </div>
    <div class="form-group">
        <label for="adresa">Adresa:</label>
        <input type="text" class="form-control" name="adresa" required>
    </div>
    <button type="submit" class="btn btn-primary">Dodaj Vlasnika</button>
</form>

<?php include '../templates/footer.php'; ?>
