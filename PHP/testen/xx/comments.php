<?php
 	$commentsFile = 'comments.txt';
 	
 	/* variable for error message */
 	$errorMessage = false;
 	
 	/* Function to sort comments list by date */
 	function cmp($a, $b){
		return strcmp($b['date'], $a['date']);
	}	
	/* check if comments file exist */
	if( file_exists($commentsFile) ){
	
		/* get comments from file */
		$commentsText = file_get_contents($commentsFile);
	
		/* create array list from comments */
		$commentsList = json_decode($commentsText,true);
	}
	/* check if new comment is posted */
	if( !empty($_POST['comment']) ){
	 
	 	/* get IP address */
	 	$happyPersonIp = $_SERVER['REMOTE_ADDR'];
	 	
	 	/* get posted comment */
	 	$sComment = strip_tags($_POST['comment']);
	 	
	 	/* check if posted message is valid */
	 	if (empty($sComment)) {
			
			/* show error */
			$errorMessage = "You should add some comment!";
	 	}else{
			/* add comment to array */
			$commentsList['comments'][] = array(
				'text' => $sComment,
				'ip' => $happyPersonIp,
				'date' => time()
			);
		
			/* convert comments to string */
			$commentsText = json_encode($commentsList);
		
			/* save comment to file */
			file_put_contents($commentsFile, $commentsText);			
		}
	 }
	/* check if comments exist */
	if(!empty($commentsList)) {
	
		/* reverse array so latest comment is first */
		$commentsList = array_reverse($commentsList,true);
		/* sort list by date */
		usort($commentsList['comments'], "cmp");
		/* create html list */		
		$commentsHTML = "<ul>";
		/* loop all comments */
		foreach( $commentsList['comments'] as $commentItem ){
			// add comment to html list
			$commentsHTML.= "<li>" . $commentItem['text'] . "</li>";
		}
		/* close html comments list */		
		$commentsHTML .= "</ul>";
	}
?>

<html>
	<head>
		<STYLE type="text/css">
			ul {list-style:none;}
			li {padding:20px;}
			.error{color:red;}
		</STYLE>	
	</head>
	<body>
		<center>
			<form id="comments" method="POST">
				<h1>test</h2>
				<textarea id="comment" name="comment" cols="70" style="font-family:cursive;font-size: 18px;font-weight:bold;"> </textarea><br/>
				<input type="submit" value="Comment">
				<?=$commentsHTML?>			
			</form>
			</center>
	</body>
</html>