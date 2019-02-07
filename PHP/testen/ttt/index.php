<html>
<head></head>
<body>
<form method="post">
  <textarea name="txt" cols="25" rows="5"></textarea>
  <br><br> <input type="submit" value="Submit" name="submit" />

  <?php
  if(isset($_POST['submit'])) {
    $com  = $_POST["txt"];
    $file = fopen("inrg.txt", "a");
    fwrite($file, "<br>");
    for ($i = 0; $i <= strlen($com) - 1; $i++) {
      fwrite($file, $com[$i]);
      if ($i % 37 == 0 && $i != 0) fwrite($file, "<br/>");
    }
    fwrite($file, "\r");
    fclose($file);
  }
  ?>

  <br>
</form>
<font face="Times New Roman"><b><p>test</p></b></font>
<font face="Comic Sans MS" color="red" size="2">
  <?php
  if (file_exists("inrg.txt")) {
  $file = fopen("inrg.txt", "r");
  echo fread($file, filesize("inrg.txt"));
  fclose($file);
  }
  ?>
</font>
</body>
</html>