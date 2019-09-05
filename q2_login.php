<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Tela de Login</title>
 </head>
 <body>
	<form method="post" name="frmLogin" action="q2_auth.php">
		<input type="hidden" name="type" value="cookie">
		<input type="submit" id="btLoginCookie" value="Logar Cookie">
	</form>
	<br><br>
	<form method="post" name="frmLogin" action="q2_auth.php">
		<input type="hidden" name="type" value="session">
		<input type="submit" id="btLoginSession" value="Logar Session">
	</form>
 </body>
</html>

