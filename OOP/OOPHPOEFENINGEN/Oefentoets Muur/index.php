<?php

require_once 'classes/class.RechteMuur.php';

$lengte = filter_input(INPUT_POST, 'lengte', FILTER_SANITIZE_NUMBER_FLOAT);
$hoogte = filter_input(INPUT_POST, 'hoogte', FILTER_SANITIZE_NUMBER_FLOAT);

if (isset($hoogte) && !empty($hoogte) &&
    isset($lengte) && !empty($lengte)) {
    $rechte_muur_object = new RechteMuur('', '');
    $rechte_muur_object->setHoogteMuur($hoogte);
    $rechte_muur_object->setLengteMuur($lengte);

    echo '<br /><pre>';
    echo __FILE__ . __LINE__ . '<br />';
    var_dump($rechte_muur_object);
    echo '</pre>';

    echo "<table border='1'><tr>";
    echo "<td>Aantal stenen:</td><td>" . $rechte_muur_object->getAantalStenen() . "</td>";
    echo "</tr><tr>";
    echo "<td>Totaal gewicht:</td><td>" . $rechte_muur_object->getGewicht() . "</td>";
    echo "</tr><tr>";
    echo "<td>Prijs:</td><td>$" . $rechte_muur_object->getPrijs() . "</td>";
    echo "</tr></table>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Muur</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<h2>Muur</h2>
<form name="lucifer" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table border="1">
        <tr>
            <td>Lengte:</td>
            <td><input type="text" name="lengte"/></td>
        </tr>
        <tr>
            <td>Hoogte:</td>
            <td><input type="text" name="hoogte"/></td>
        </tr>
    </table>
    <input type="submit" value="Verwerken"/>
    <input type="reset" value="Reset"/>
</form>
</body>
</html>