<?php

require_once 'classes/class.Stapel.php';

$hoogte = filter_input(INPUT_POST, 'hoogte', FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($hoogte) && !empty($hoogte)) {
    $lucifer_stapel_object = new Stapel($hoogte);
    $lucifer_stapel_object->setHoogte($hoogte);

    echo '<br /><pre>';
    echo __FILE__ . __LINE__ . '<br />';
    var_dump($lucifer_stapel_object);
    echo '</pre>';

    echo "<table border='1'><tr>";
    echo "<td>Aantal doosjes:</td><td>" . $lucifer_stapel_object->getAantalDoosjes() . "</td>";
    echo "</tr><tr>";
    echo "<td>Aantal lucifers:</td><td>" . $lucifer_stapel_object->getAantalLucifers() . "</td>";
    echo "</tr><tr>";
    echo "<td>Totaal:</td><td>$" . $lucifer_stapel_object->getPrijsLucifers() . "</td>";
    echo "</tr></table>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lucifers</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<h2>Lucifer</h2>
<form name="lucifer" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table border="1">
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