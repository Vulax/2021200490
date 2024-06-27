<?php include '../templates/header.php'; ?>
<?php
include '../config.php';

$sql = "SELECT * FROM Vlasnik";
$result = $conn->query($sql);
?>
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>JMBG</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Adresa</th>
            <th>Krud</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["JMBG"] . "</td>";
                echo "<td>" . $row["Ime"] . "</td>";
                echo "<td>" . $row["Prezime"] . "</td>";
                echo "<td>" . $row["Adresa"] . "</td>";
                echo "<td>";
                echo "<a class='btn btn-primary btn-sm' href='edit.php?jmbg=" . $row["JMBG"] . "'>Izmeni</a> ";
                echo "<a class='btn btn-danger btn-sm' href='delete.php?jmbg=" . $row["JMBG"] . "'>Obriši</a> ";
                echo "<a class='btn btn-info btn-sm' href='../racun/list.php?jmbg=" . $row["JMBG"] . "'>Prikaži račune</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nema vlasnika</td></tr>";
        }
        ?>
    </tbody>
</table>
<?php include '../templates/footer.php'; ?>
