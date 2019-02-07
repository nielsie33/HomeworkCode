<?php
$name = empty($_GET["name"]) ? "" : $_GET["name"];
$dateofbirth = empty($_GET["dateofbirth"]) ? "" : $_GET["dateofbirth"];
$vtype = empty($_GET["vtype"]) ? "" : $_GET["vtype"];
$beginingwith = empty($_GET["beginingwith"]) ? "" : $_GET["beginingwith"];
$observations = empty($_GET["observations"]) ? "" : $_GET["observations"];
$rejected = empty($_GET["rejected"]) ? "" : $_GET["rejected"];
$why = empty($_GET["why"]) ? "" : $_GET["why"];
if(!$name){$message1 = "Name.";}
if(!$dateofbirth){$message2 = "Date of Birth.";}
if(!$vtype){$message3 = "V Type.";}
if(!$beginingwith){$message4 = "Begining with.";}
if(!$observations){$message7 = "Observations.";}
if(!$rejected){$message5 = "Rejected.";}
if(!$why){$message6 = "Why.";}
?>
<html>
  <head>
  <title>Index</title>
  </head>
  <body>
  <h2 align="center">MA Persons</h2>
  <form method="post" action="store_it.php">
    <table width="50%" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td width="9%"><?php echo $message1; ?></td>
        <td width="91%"><input type="text" name="name" size="100" maxlength="100" value="<?php echo $name; ?>">
         </div>
        </td>
      </tr>
      <tr>
        <td width="9%"><?php echo $message2; ?></td>
        <td height="2"><input type="text" name="dob" size="100" maxlength="100" value="<?php echo $dateofbirth; ?>"></td>
      </tr>
      <tr>
        <td width="9%" height="32"><?php echo $message3; ?></td>
        <td height="32"><input type="text" name="vtype" size="100" maxlength="100" value="<?php echo $vtype; ?>"></td>
      </tr>
      <tr>
        <td width="9%"><?php echo $message4; ?></td>
        <td height="2"><input type="text" name="bw" size="100" maxlength="100" value="<?php echo $beginingwith; ?>"></td>
      </tr>
      <tr>
        <td width="9%"><?php echo $message7; ?></td>
        <td height="2"><textarea name="ob" cols="97" rows="4" value="<?php echo $observations; ?>">  </textarea></td>
      </tr>
      <tr>
        <td width="9%" height="5"><?php echo $message5; ?></td>
        <td height="5"><textarea name="rej" cols="97" rows="4" value="<?php echo $rejected; ?>">  </textarea></td>
      </tr>
      <tr>
        <td width="9%"><?php echo $message6; ?></td>
        <td height="2"><textarea name="why" cols="97" rows="4" value="<?php echo $why; ?>">  </textarea></td>
      </tr>

      <tr>
        <td colspan="2">
          <div align="center">
            <input type="submit" name="Submit" value="Add person" />

          </div>
        </td>
      </tr>
    </table>
  </form>
  </body>
  </html>

<body>
</body>
</html>