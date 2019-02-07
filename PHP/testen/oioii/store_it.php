<?php
$name = empty($_POST["name"]) ? "" : $_POST["name"];
$dob = empty($_POST["dob"]) ? "" : $_POST["dob"];
$bw = empty($_POST["bw"]) ? "" : $_POST["bw"];
$vtype = empty($_POST["vtype"]) ? "" : $_POST["vtype"];
$ob = empty($_POST["ob"]) ? "" : $_POST["ob"];
$rej = empty($_POST["rej"]) ? "" : $_POST["rej"];
$why = empty($_POST["why"]) ? "" : $_POST["why"];
if(!$name || !$dob || !$bw || !$vtype || !$ob || !$rej || !$why){header("location:index.php?name=$name&dateofbirth=$dob&beginingwith=$bw&vtype=$vtype&observations=$ob&rejected=$rej&why=$why");}
else
{
$file = "PhoneBook.txt";
$a = fopen($file, "a");
fwrite($a,$name."\r\n");
fwrite($a,$dob."\r\n");
fwrite($a,$vtype."\r\n");
fwrite($a,$bw."\r\n");
fwrite($a,$ob."\r\n");
fwrite($a,$rej."\r\n");
fwrite($a,$why."\r\n");
fclose($a);
  $a = fopen($file, "r");
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Date Of Birth</th><th>V-Type</th><th>Begining With</th><th>Observations</th><th>Rejected</th><th>Why</th></tr>";
while(!feof($a))
{
  echo "<tr><td>".fgets($a)."</td><td>".fgets($a)."</td><td>".fgets($a)."</td><td>".fgets($a)."</td><td>".fgets($a)."</td><td>".fgets($a)."</td><td>".fgets($a)."</td></tr>";
  }
echo "</table>";
fclose($a);
}
?>
Save Successfully!<br> 
Want to add Another Entry? Click Add Another Button
<form action="index.php">
<input type="submit" value="Add another">
</form>