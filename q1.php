<?php 



for ($i = 1; $i <= 100; $i++) {
	$text = ""; 
    if(! ($i % 3))
		$text .=  "Fizz";
	if(!($i % 5))
		$text .=  "Buzz";
	if($text == "")
		echo $i."<br>";
	else
		echo $text."<br>";
}


?>