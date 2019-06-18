<?php
$post_array_to_filter = array(
    'submit' => FILTER_SANITIZE_SPECIAL_CHARS,
    'klantnaam' => FILTER_SANITIZE_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_SPECIAL_CHARS,
    'password' => FILTER_SANITIZE_SPECIAL_CHARS
);
$filteredPostArray = filter_input_array(INPUT_POST, $post_array_to_filter);

if (isset($filteredPostArray["submit"])) {
    $query = "INSERT INTO klanten (klantnaam, email, wachtwoord) 
	VALUES ('" . $filteredPostArray["klantnaam"] . "','" . $filteredPostArray["email"] . "','" . password_hash($filteredPostArray["password"], PASSWORD_BCRYPT) . "')";
    $insert = $database->prepare($query);

    $count = $database->prepare("SELECT klantnaam FROM klanten WHERE klantnaam=:klantnaam");
    $count->bindParam(":klantnaam", $filteredPostArray['klantnaam']);
    $count->execute();
    $checkExisting = $count->rowCount();

    try {
        if ($checkExisting > 0) {
            echo "Klant met deze naam bestaat al";
        } else {
            $insert->execute(array());
            echo "<script>alert('Klant toegevoegd.');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Klant NIET toegevoegd.');</script>";
    }
}
?>
<?php include_once 'includes/header.php'; ?>
<body>
<?php include_once 'includes/navbar.php'; ?>
<div class="form-style-6">
    <h1>Aanmelden</h1>
    <form name="gebruikeraanmaken" action="" method="post">
        <input type="text" name="klantnaam" placeholder="Naam"/>
        <input type="email" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Wachtwoord"/>
        <input type="submit" name="submit" value="Aanmaken"/>
    </form>
</div>
</body>
</html>