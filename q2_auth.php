<?php 
session_start();


if (isset($_POST)) { 
	if($_POST["type"]=="session")
	{
		$_SESSION['loggedin']=true;
	}
	if($_POST["type"]=="cookie")
	{
		setcookie("Loggedin", true, time()+36000);
	}
	header("Location: q2.php"); 
	exit();
}

?>
