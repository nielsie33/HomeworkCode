<?php
$post_array_to_filter = array(
    'submit' => FILTER_SANITIZE_SPECIAL_CHARS,
    'klanten' => FILTER_SANITIZE_SPECIAL_CHARS,
    'soort' => FILTER_SANITIZE_SPECIAL_CHARS,
    'ras' => FILTER_SANITIZE_SPECIAL_CHARS,
    'naam' => FILTER_SANITIZE_SPECIAL_CHARS,
    'gebdatum' => FILTER_SANITIZE_SPECIAL_CHARS
);
$filteredPostArray = filter_input_array(INPUT_POST, $post_array_to_filter);

if (isset($filteredPostArray["submit"])) {
    $query = "INSERT INTO huisdieren (klant_id, soort, ras, naam, gebdatum) 
	VALUES ('" . $filteredPostArray["klanten"] . "','" . $filteredPostArray["soort"] . "','" . $filteredPostArray["ras"] . "','" . $filteredPostArray["naam"] . "','" . $filteredPostArray["gebdatum"] . "')";
    $insert = $database->prepare($query);
    try {
        $insert->execute(array());
        echo "<script>alert('Huisdier toegevoegd.');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Huisdier NIET toegevoegd.');</script>";
    }
}
?>
<?php include_once 'includes/header.php'; ?>
<body>
<?php include_once 'includes/navbar.php'; ?>
<?php if (isset($_SESSION['logged_in'])) { ?>
    <div class="form-style-6">
        <h1>Huisdier inschrijven</h1>
        <form name="huisdieraanmaken" action="" method="post">
            <input type="hidden" name="klanten" value="<?= $_SESSION['user_id']; ?>"/>
            <input type="text" name="soort" placeholder="Soort"/>
            <input type="text" name="ras" placeholder="Ras"/>
            <input type="text" name="naam" placeholder="Naam"/>
            <input type="date" name="gebdatum"/>
            <input type="submit" name="submit" value="Aanmaken"/>
        </form>
    </div>
    <?php
} else {
    echo "<center><h1>Je moet ingelogd zijn.</center></h1>";
    echo "<center><a href='index.php'>Klik hier om in te loggen</a></center>";
} ?>
</body>
</html>