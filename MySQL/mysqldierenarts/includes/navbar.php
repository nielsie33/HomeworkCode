<ul>
    <?php if (!isset($_SESSION['logged_in'])) { ?>
        <li><a href="index.php">Home</a></li>
        <li><a href="?page=gebruikers">Aanmelden</a></li>
    <?php } ?>
    <?php if (isset($_SESSION['logged_in'])) { ?>
        <li><a href="?page=afspraken">Afspraken</a></li>
        <li><a href="?page=huisdieren">Huisdieren</a></li>
        <li><a href="?page=afsprakenoverzicht">Afspraken overzicht</a></li>
        <li><a href="?page=uitloggen">Uitloggen</a></li>
    <?php } ?>
</ul>
<?php if (isset($_SESSION['logged_in'])) { ?>
    Welkom, <?= $_SESSION['klantnaam'] ?>
<?php } ?>