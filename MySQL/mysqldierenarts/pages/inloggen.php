<?php include_once 'includes/header.php'; ?>
<?php
$array_to_filter = array(
    'klantnaam' => FILTER_SANITIZE_SPECIAL_CHARS,
    'wachtwoord' => FILTER_SANITIZE_SPECIAL_CHARS,
    'login' => FILTER_SANITIZE_SPECIAL_CHARS
);
$filtered_array = filter_input_array(INPUT_POST, $array_to_filter);

if (isset($filtered_array['login'])) {
    $username = !empty($filtered_array['klantnaam']) ? trim($filtered_array['klantnaam']) : null;
    $passwordAttempt = !empty($filtered_array['wachtwoord']) ? trim($filtered_array['wachtwoord']) : null;
    $sql = "SELECT id, klantnaam, wachtwoord FROM klanten WHERE klantnaam = :username";
    $stmt = $database->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user === false) {
        echo "Gebruiker bestaat niet";
        header('Refresh: 3; url=index.php');
    } else {
        $validPassword = password_verify($passwordAttempt, $user['wachtwoord']);
        if ($validPassword) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;
            $_SESSION['klantnaam'] = $username;
            echo "Je bent ingelogd!";
            header('Refresh: 3; url=?page=afsprakenoverzicht');
        } else {
            echo "Foute combinatie";
            header('Refresh: 3; url=index.php');
        }
    }
}
?>
<body>
<?php include_once 'includes/navbar.php'; ?>
<div class="form-style-6">
    <h1>Inloggen</h1>
    <form name="login" action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="text" name="klantnaam" placeholder="Naam"/>
        <input type="password" name="wachtwoord" placeholder="Wachtwoord"/>
        <input type="submit" name="login" value="Inloggen"/>
    </form>
</div>
</body>
</html>