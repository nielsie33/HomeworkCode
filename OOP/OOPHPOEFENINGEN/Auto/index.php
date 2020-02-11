<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Auto</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<h2>Auto Class</h2>
<form name="auto" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table border="1">
        <tr>
            <td>Merk:</td>
            <td><input type="text" name="merk"/></td>
        </tr>
        <tr>
            <td>Type:</td>
            <td><input type="text" name="type"/></td>
        </tr>
        <tr>
            <td>Kenteken:</td>
            <td><input type="text" name="kenteken"/></td>
        </tr>
        <tr>
            <td>Brandstof:</td>
            <td><input type="text" name="brandstof"/></td>
        </tr>
        <tr>
            <td>Snelheid:</td>
            <td><input type="text" name="snelheid"/></td>
        </tr>
    </table>
    <input type="submit" value="Verwerken"/>
    <input type="reset" value="Reset"/>

    <?php
    include 'class/auto.php';
    if (!filter_input(INPUT_POST, 'merk', FILTER_SANITIZE_SPECIAL_CHARS) ||
        !filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS) ||
        !filter_input(INPUT_POST, 'kenteken', FILTER_SANITIZE_SPECIAL_CHARS) ||
        !filter_input(INPUT_POST, 'brandstof', FILTER_SANITIZE_SPECIAL_CHARS) ||
        !filter_input(INPUT_POST, 'snelheid', FILTER_VALIDATE_INT)) {

        echo "<br>";
        echo "No values are sent in the form";
    } else {
        $typeMerk = filter_input(INPUT_POST, 'merk', FILTER_SANITIZE_SPECIAL_CHARS);
        $typeAuto = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        $typeKenteken = filter_input(INPUT_POST, 'kenteken', FILTER_SANITIZE_SPECIAL_CHARS);
        $typeBrandstof = filter_input(INPUT_POST, 'brandstof', FILTER_SANITIZE_SPECIAL_CHARS);
        $typeSnelheid = filter_input(INPUT_POST, 'snelheid', FILTER_VALIDATE_INT);

        $newAuto = new auto($typeMerk, $typeAuto, $typeKenteken, $typeBrandstof, $typeSnelheid);
        var_dump($newAuto);
        echo "<br />";
        echo $newAuto->displayInfo();
        $newAuto->saveDatabase();
        echo "<br />";
        echo "<br />";
        var_dump($newAuto);
        echo "<br />";
    }
    ?>
</form>
</body>
</html>
