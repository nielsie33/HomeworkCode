<?php
$acc = 'comments.txt';
$textcomment = file_get_contents($acc);
$lijst = json_decode($textcomment,true);
		if(!empty($_POST['text'])) {
				$sComment = $_POST['text'];
				$lijst['blogs'][] = array(
						'text' => $sComment,
				);
		}
		$textcomment = json_encode($lijst);
		file_put_contents($acc, $textcomment);			
		$blogpost = "<ul>"; 
		foreach($lijst['blogs'] as $commentItem){    
				$blogpost.= "<center style='margin-right:40px;'>" . $commentItem['text'] . "</center>"; 
		} 
		$blogpost .= "</ul>";
		echo "$blogpost";
?>

<form action="" method="POST">
<h1>TESTasdssdfjksdfhkj</h1>
<textarea id="comment" name="comment" cols="70"> </textarea>
<input type="submit" value="VERSTUREN"> 
</form>


	if(file_exists("blogs.txt")) {
	$bestand = fopen("blogs.txt", "r");
	echo "<center><table border='1'>
	<tbody>
		<tr>
		<td>$naam</td>
		<td>$email</td>
		<td>$bericht</td>
		<td>$geformatteerde_datum</td>
		</tr>
	</tbody>
	</table>" . fread($bestand, filesize("blogs.txt")) . "</center>";
	fclose($bestand);
	}