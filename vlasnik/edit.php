<?php
include '../config.php';
include '../templates/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmbg = $_POST['jmbg'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $adresa = $_POST['adresa'];

    $sql = "UPDATE Vlasnik SET Ime='$ime', Prezime='$prezime', Adresa='$adresa' WHERE JMBG='$jmbg'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Uspešno promenjeni podaci Vlasnika.</div>";
        echo "<script>
                    document.getElementById('ime').value = '';
                    document.getElementById('prezime').value = '';
                    document.getElementById('adresa').value = '';
                  </script>";
        
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
} else {
    $jmbg = @$_GET['jmbg'];
    $sql = "SELECT * FROM Vlasnik WHERE JMBG='$jmbg'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<form method="post" action="" class="mt-4">
    <div class="form-group">
        <label for="ime">JMBG:</label>
        <input type="text" class="form-control" name="jmbg" value="<?php echo @$row['JMBG']; ?>" required>
    </div>
    <div class="form-group">
        <label for="ime">Ime:</label>
        <input type="text" class="form-control" name="ime" value="<?php echo @$row['Ime']; ?>" required>
    </div>
    <div class="form-group">
        <label for="prezime">Prezime:</label>
        <input type="text" class="form-control" name="prezime" value="<?php echo @$row['Prezime']; ?>" required>
    </div>
    <div class="form-group">
        <label for="adresa">Adresa:</label>
        <input type="text" class="form-control" name="adresa" value="<?php echo @$row['Adresa']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Ažuriraj Vlasnika</button>
</form>

<?php include '../templates/footer.php'; ?>
