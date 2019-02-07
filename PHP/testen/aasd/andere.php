<?php
    if(isset($_POST['submit'])) {

    $fp = fopen('xd.txt', 'a');
    fwrite($fp, $_POST['text']."\n");
    fclose($fp);
}
header("Location: theformpage.php");
exit();
?>