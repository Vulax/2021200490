<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../config.php';
include '../templates/header.php';

//Fečovanje vlasnika 
$sqlUsers = "SELECT * FROM Vlasnik";
$resultUsers = $conn->query($sqlUsers);

//Fečovanje računa
$sqlAccounts = "SELECT * FROM Racun";
$resultAccounts = $conn->query($sqlAccounts);
?>

<div class="row mt-4">
    <div class="col-md-6">
        <form class="form-inline mb-4">
            <div class="form-group">
                <label for="selectUser">Izaberi Vlasnika:</label>
                <select class="form-control mx-sm-3" id="selectUser">
                    <option value="">Izaberi...</option>
                    <?php
                    if ($resultUsers->num_rows > 0) {
                        while($row = $resultUsers->fetch_assoc()) {
                            echo "<option value='" . $row["JMBG"] . "'>" . $row["Ime"] . " " . $row["Prezime"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </form>
    </div>
</div>

<table id="accountTable" class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Račun ID</th>
            <th>Stanje</th>
            <th>Krud</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($resultAccounts->num_rows > 0) {
            while($row = $resultAccounts->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Stanje"] . "</td>";
                echo "<td>";
                echo "<a class='btn btn-primary btn-sm' href='edit.php?id=" . $row["ID"] . "'>Izmeni</a> ";
                echo "<a class='btn btn-danger btn-sm' href='delete.php?id=" . $row["ID"] . "'>Obriši</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Ni jedan račun nije nadjen.</td></tr>";
        }
        ?>
    </tbody>
</table>

<script>
    //Slusam selektor za promenu
    document.getElementById('selectUser').addEventListener('change', function() {
        var jmbg = this.value;
        var accountTable = document.getElementById('accountTable').getElementsByTagName('tbody')[0];
        //Dinamicno prikazivanje sadrzaja bez refreshovanja stranice koristeci apija. 
        //Drugi nacin bi mogao biti koristeci XML umesto JSONa.
        if (jmbg) {
            fetch('/2021200490/api/getAccounts.php?jmbg=' + jmbg) //getAccounts api prima jmbg kao parametar i vraca podatke o racunima datog jbmbga.
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        accountTable.innerHTML = '';
                        data.forEach(account => {
                            var row = `<tr>
                                <td>${account.ID}</td>
                                <td>${account.Stanje}</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='edit.php?id=${account.ID}'>Izmeni</a>
                                    <a class='btn btn-danger btn-sm' href='delete.php?id=${account.ID}'>Obriši</a>
                                </td>
                            </tr>`;
                            accountTable.innerHTML += row;
                        });
                    } else {
                        accountTable.innerHTML = "<tr><td colspan='3'>Ni jedan račun nije nađen.</td></tr>";
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            //Resetovanje tabele ako nije izabran korisnik.
            accountTable.innerHTML = '';
        }
    });
</script>
<p>Dobrodošli, <?php echo $_SESSION['username']; ?>!</p>
<a href="../logout.php">Odjavi se</a>

<?php include '../templates/footer.php'; ?>
