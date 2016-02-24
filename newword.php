<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
  	<?php
  	$word = $_POST["word"];
  	$word = strtoupper($word);
  	
  	$words = explode("\n", file_get_contents('words.txt'));
  	array_push($words, $word);
  	file_put_contents("words.txt", implode("\n", $words));
  	?>
  	
  	<p>New word was written to the database.<br>
  	Click <a href="http://www.cameronnoyer.info/hangman.php">here</a> to play, or click <a href="http://www.cameronnoyer.info/newword.html">here</a> to add another word.
  	</p>
  </body>
</html>