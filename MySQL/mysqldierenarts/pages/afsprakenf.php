<?php
$query2 = "SELECT * FROM huisdieren WHERE klant_id = {$_SESSION['user_id']};";
$huisdieren = $database->prepare($query2);
try {
    $huisdieren->execute(array());
    $huisdieren->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<script>alert('Geen huisdieren gevonden.');</script>";
}
?>
<?php
$post_array_to_filter = array(
    'submit' => FILTER_SANITIZE_SPECIAL_CHARS,
    'datum' => FILTER_SANITIZE_SPECIAL_CHARS,
    'tijd' => FILTER_SANITIZE_SPECIAL_CHARS,
    'klanten' => FILTER_SANITIZE_SPECIAL_CHARS,
    'huisdieren' => FILTER_SANITIZE_SPECIAL_CHARS
);
$filteredPostArray = filter_input_array(INPUT_POST, $post_array_to_filter);

if (isset($filteredPostArray["submit"])) {
    $query = "INSERT INTO afspraken (datum, tijd, klant_id, huisdier_id) 
	VALUES ('" . $filteredPostArray["datum"] . "','" . $filteredPostArray["tijd"] . "','" . $filteredPostArray["klanten"] . "','" . $filteredPostArray["huisdieren"] . "')";
    $insert = $database->prepare($query);
    try {
        $insert->execute(array());
        echo "<script>alert('Afspraak toegevoegd.');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Afspraak NIET toegevoegd.');</script>";
    }
}
?>
<?php include_once 'includes/header.php'; ?>
<body>
<?php include_once 'includes/navbar.php'; ?>
<?php if (isset($_SESSION['logged_in'])) { ?>
    <div class="form-style-6">
        <h1>Afspraak aanmaken</h1>
        <form name="afspraakaanmaken" action="" method="post">
            <input type="hidden" name="klanten" value="<?= $_SESSION['user_id']; ?>"/>
            <input type="date" name="datum"/>
            <input type="text" name="tijd" placeholder="Tijd"/>
            <select name="huisdieren">
                <?php foreach ($huisdieren as $dier) { ?>
                    <option value="<?= $dier['id']; ?>"><?= $dier['naam']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="submit" value="Aanmaken"/>
        </form>
    </div>
    <?php
} else {
    echo "<center><h1>Je moet ingelogd zijn.</center></h1>";
    echo "<center><a href='index.php'>Klik hier om in te loggen</a></center>";
} ?>
<script>
    $("select option:contains('Admin')").attr("disabled", "disabled")
</script>
</body>
</html>