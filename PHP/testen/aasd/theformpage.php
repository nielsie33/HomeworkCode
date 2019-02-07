<html>
<head>
</head>
<body>
<form method="post" action="andere.php">
    <textarea name="text" cols="25" rows="5" placeholder="comment"></textarea><br><br>
    <input type="submit" name="submit" value="Submit">
    <br>
</form>
<hr />
<?php
    $fh = fopen('xd.txt','r');
    while ($line = fgets($fh)){
        echo nl2br($line);
    }
    fclose($fh);
?>
</body>
</html>