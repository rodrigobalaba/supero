<?php 
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
	header("Location: https://www.google.com/search?q=session"); 
	exit(); 
} elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) { 
	header("Location: https://www.google.com/search?q=cookie"); 
	exit();  
} else {
	header("Location: q2_login.php"); 
	exit();
}

?>
