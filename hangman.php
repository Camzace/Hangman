<?php

echo '
 <!DOCTYPE html>
<html>
  <head><link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>Hangman</title>
  </head>
  <body><div class="container">
';

$wordarray = file("words.txt");

if (isset($_GET["guesses"])) {
	$guesses = $_GET["guesses"];
} else {
	$guesses = "";
}

if (isset($_GET["n"])) {
	$n = $_GET["n"];
} else {
	$n = rand(0, count($wordarray)-1);
}

$word = trim($wordarray[$n]);
$complete = true;
$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$wrong = 0;

$guessedString = "<p>";

for ($i = 0; $i < strlen($word); $i++) {
	if ($word[$i] == " ") {
		$guessedString .= " \\ ";
	} elseif (strstr($guesses, $word[$i])) {
		$guessedString .= $word[$i] . " ";
	} else {
		$guessedString .= "_ ";
		$complete = false;
	}
}

$guessedString .= "</p>";

$guessesString = "<p>";

for ($i = 0; $i < strlen($letters); $i++) {
	if (strstr($guesses, $letters[$i])) {
		$guessesString .= "_";
		if (!strstr($word, $letters[$i])) $wrong++;
	} else {
		$guessesString .= "<a href=\"$self?guesses=$letters[$i]$guesses&n=$n\">$letters[$i]</a>";
	}
}

$guessesString .= "</p>";

echo $guessedString;

if ($wrong >= 6) {
	echo "<p>You lose. The word was $word. Click <a href=\"$self?\">here</a> to play again.";
} else if ($complete) {
	echo "<p>You win! Click <a href=\"$self?\">here</a> to play again.";
} else {
	echo $guessesString;
	echo "You have guessed $wrong wrong out of 6.";
}


  
echo  "</div></body>
</html>";
?>