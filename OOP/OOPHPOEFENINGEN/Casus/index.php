<?php
require_once 'class/class.Vrachtwagenoplegger.php';

$lengte = filter_input(INPUT_POST, 'lengte', FILTER_SANITIZE_SPECIAL_CHARS);
$breedte = filter_input(INPUT_POST, 'breedte', FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($breedte) && !empty($lengte)) {
    $vrachtwagenopleggerObject = new Vrachtwagenoplegger($lengte, $breedte);

    echo '<br /><pre>';
    echo __FILE__ . __LINE__ . '<br />';
    var_dump($vrachtwagenopleggerObject);
    echo '</pre>';

    echo "<table border='1'><tr>";
    echo "<td>Aantal pallets:</td><td>" . $vrachtwagenopleggerObject->getAantalPallets() . "</td>";
    echo "</tr><tr>";
    echo "<td>Totale waarde:</td><td>$" . $vrachtwagenopleggerObject->getWaarde() . "</td>";
    echo "</tr><tr>";
    echo "<td>Waarde pallet:</td><td>$" . $vrachtwagenopleggerObject->getWaardePallet() . "</td>";
    echo "</tr><tr>";
    echo "<td>Product type:</td><td>" . $vrachtwagenopleggerObject->getProductType() . "</td>";
    echo "</tr></table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Casus</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<h2>Casus</h2>
<form name="lucifer" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table border="1">
        <tr>
            <td>Lengte:</td>
            <td><input type="text" name="lengte"/></td>
        </tr>
        <tr>
            <td>Breedte:</td>
            <td><input type="text" name="breedte"/></td>
        </tr>
    </table>
    <input type="submit" value="Verwerken"/>
    <input type="reset" value="Reset"/>
</form>
</body>
</html>
