<?php include_once 'includes/header.php'; ?>
<body>
<?php include_once 'includes/navbar.php'; ?>
<?php if (isset($_SESSION['logged_in'])) { ?>
    <h1>
        <center>Afspraken overzicht
    </h1></center>
    <?php
    $get_array_to_filter = array(
        'delete' => FILTER_SANITIZE_SPECIAL_CHARS,
        'update' => FILTER_SANITIZE_SPECIAL_CHARS
    );
    $filteredGetArray = filter_input_array(INPUT_GET, $get_array_to_filter);

    if (isset($filteredGetArray['delete'])) {
        $query = "DELETE FROM afspraken WHERE id = {$filteredGetArray['delete']}";
        $insert = $database->prepare($query);
        try {
            $insert->execute(array());
            echo "<script>alert('Afspraak verwijderd.');</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Afspraak NIET verwijderd.');</script>";
        }
    }

    $post_array_to_filter = array(
        'updateSubmit' => FILTER_SANITIZE_SPECIAL_CHARS,
        'nieuwetijd' => FILTER_SANITIZE_SPECIAL_CHARS,
        'nieuwedatum' => FILTER_SANITIZE_SPECIAL_CHARS
    );
    $filteredPostArray = filter_input_array(INPUT_POST, $post_array_to_filter);

    $tijd = $filteredPostArray['nieuwetijd'];
    $datum = $filteredPostArray['nieuwedatum'];

    if (isset($filteredPostArray['updateSubmit'])) {
        $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
        $query = "UPDATE afspraken SET tijd = '$tijd' WHERE id = {$filteredGetArray['update']};
            UPDATE afspraken SET datum = '$datum' WHERE id = {$filteredGetArray['update']};";
        var_dump($query);
        $insert = $database->prepare($query);
        try {
            $insert->execute(array());
            echo "<script>alert('Afspraak bijgewerkt.');</script>";
            header("Location: ?page=afsprakenoverzicht");
        } catch (PDOException $e) {
            echo "<script>alert('Afspraak NIET bijgewerkt.');</script>";
        }
    }

    if (isset($filteredGetArray['update'])) { ?>
        <div class="form-style-6">
            <h1>Afspraak bijwerken</h1>
            <form name="afspraakbijwerken" action="" method="post">
                <input type="text" name="nieuwetijd" placeholder="Nieuwe tijd"/>
                <input type="date" name="nieuwedatum"/>
                <input type="submit" name="updateSubmit" value="Bijwerken"/>
            </form>
        </div>
        <?php
    } else {

        $query = "SELECT afspraken.id, datum, tijd, klantnaam, naam, soort
		FROM afspraken
		LEFT JOIN klanten ON afspraken.klant_id = klanten.id
		LEFT JOIN huisdieren ON afspraken.huisdier_id = huisdieren.id;";
        $afspraken = $database->prepare($query);
        try {
            $afspraken->execute(array());
            $afspraken->setFetchMode(PDO::FETCH_ASSOC);
            echo "<center><table id='tabel'>
			<th>Datum</th>
			<th>Tijd</th>
			<th>Klant naam</th>
			<th>Dier naam</th>
			<th>Soort</th>";
            if ($_SESSION['klantnaam'] === 'Admin') {
                echo "<th>Verwijderen</th>
            <th>Bijwerken</th>";
            }
            foreach ($afspraken as $afspraak) {
                echo "<tr>";
                echo "<td>" . $afspraak["datum"] . "&nbsp;&nbsp; </td>";
                echo "<td>" . $afspraak["tijd"] . "&nbsp;&nbsp; </td>";
                echo "<td>" . $afspraak["klantnaam"] . "&nbsp;&nbsp; </td>";
                echo "<td>" . $afspraak["naam"] . "&nbsp;&nbsp; </td>";
                echo "<td>" . $afspraak["soort"] . "&nbsp;&nbsp; </td>";
                if ($_SESSION['klantnaam'] === 'Admin') {
                    echo "<td><a onclick=\"return confirm('Weet je het zeker dat je dit item wilt verwijderen?');\" href='?page=afsprakenoverzicht&delete=" . $afspraak['id'] . "'>Verwijder</a></td>";
                    echo "<td><a href='?page=afsprakenoverzicht&update=" . $afspraak['id'] . "'>Bijwerken</a></td>";
                }
                echo "</tr>";
            }
            echo "</table></center>";
        } catch (PDOException $e) {
            echo "<script>alert('Geen afspraken gevonden.');</script>";
        }
    }
} else {
    echo "<center><h1>Je moet ingelogd zijn.</center></h1>";
    echo "<center><a href='index.php'>Klik hier om in te loggen</a></center>";
}
?>
<br><br>
</body>
</html>