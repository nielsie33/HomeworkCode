<?php
include_once 'classes/Aquarium.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!filter_input(INPUT_POST, 'lengte', FILTER_VALIDATE_INT) ||
    !filter_input(INPUT_POST, 'breedte', FILTER_VALIDATE_INT) ||
    !filter_input(INPUT_POST, 'hoogte', FILTER_VALIDATE_INT)) {

    echo "<br>";
    echo "Geen gegevens voor aquarium opgegeven";
} else {
    $lengte = filter_input(INPUT_POST, 'lengte', FILTER_VALIDATE_INT);
    $breedte = filter_input(INPUT_POST, 'breedte', FILTER_VALIDATE_INT);
    $hoogte = filter_input(INPUT_POST, 'hoogte', FILTER_VALIDATE_INT);
    $vissen = filter_input(INPUT_POST, 'vissen', FILTER_VALIDATE_INT);
    $slakken = filter_input(INPUT_POST, 'slakken', FILTER_VALIDATE_INT);

    $aquarium = new aquarium($lengte, $breedte, $hoogte, $vissen, $slakken);
    $slak = new slak();
    $vis = new vis();
    $max_aantal_vissen = round(($aquarium->getInhoud() - ($slak->getRuimte() * $aquarium->getAantalSlak())) / $vis->getRuimte());
    $max_aantal_slakken = round(($aquarium->getInhoud() - ($vis->getRuimte() * $aquarium->getAantalVis())) / $slak->getRuimte());
    $totaal_prijs_aquarium = ($max_aantal_vissen * $vis->getPrijs()) + ($aquarium->getAantalSlak() * $slak->getPrijs());
    $prijs_vissen = ($aquarium->getAantalVis() * $vis->getPrijs());
    $prijs_slakken = ($aquarium->getAantalSlak() * $slak->getPrijs());

    var_dump($aquarium);

    echo "<table border='1'><tr>";
    echo "<td>De inhoud van het aquarium is:</td><td>" . $aquarium->getInhoud() / 1000 . "L</td>";
    echo "</tr>";

    if (isset($slakken) && !empty($slakken)) {
        echo "<tr><td>Max aantal slakken:</td><td>" . $max_aantal_slakken . "</td>";
        echo "</tr>";
        echo "<tr><td>Prijs voor " . $aquarium->getAantalSlak() . " slakken:</td><td>$" . $prijs_slakken . "</td>";
        echo "</tr>";
    }
    if (isset($vissen) && !empty($vissen)) {
        echo "<tr><td>Max aantal vissen:</td><td>" . $max_aantal_vissen . "</td>";
        echo "</tr>";
        echo "<tr><td>Prijs voor " . $aquarium->getAantalVis() . " vissen:</td><td>$" . $prijs_vissen . "</td>";
        echo "</tr>";
    }
    if (isset($vissen) && !empty($vissen) && isset($slakken) && !empty($slakken)) {
        echo "<tr><td>Prijs voor " . $aquarium->getAantalVis() . " vissen en " . $aquarium->getAantalSlak() . " slakken:</td><td>$" . ($prijs_vissen + $prijs_slakken) . "</td>";
        echo "</tr>";
    }
    if (empty($slakken) && empty($vissen)) {
        echo "<tr><td>Max aantal vissen:</td><td>" . $max_aantal_vissen . "</td>";
        echo "</tr>";
        echo "<tr><td>Max aantal slakken:</td><td>" . $max_aantal_slakken . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aquarium</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<h2>Aquarium Calculator</h2>
<form name="aqarium" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table border="1">
        <tr>
            <td>Lengte aquarium:</td>
            <td><input type="text" name="lengte"/></td>
        </tr>
        <tr>
            <td>Breedte aquarium:</td>
            <td><input type="text" name="breedte"/></td>
        </tr>
        <tr>
            <td>Hoogte aquarium:</td>
            <td><input type="text" name="hoogte"/></td>
        </tr>
        <tr>
            <td>Aantal vissen:</td>
            <td><input type="text" name="vissen"/></td>
        </tr>
        <tr>
            <td>Aantal slakken:</td>
            <td><input type="text" name="slakken"/></td>
        </tr>
    </table>
    <input type="submit" value="Verwerken"/>
    <input type="reset" value="Reset"/>
</form>
</body>
</html>