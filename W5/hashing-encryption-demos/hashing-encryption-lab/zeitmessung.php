<!DOCTYPE html>
<html lang="de-de" dir="ltr" vocab="http://schema.org/"  xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://ogp.me/ns/fb#">
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	  <style>
		html {
			font-family: 'Open Sans', sans-serif;
			font-size: 17px;
			font-weight: 300;
			line-height: 1.714;
		}
		h1, h2, h3 {
			color:rgb(28,173,228);
		}
		.box {
			border:1px solid grey;
			background:#dddddd;
			display:inline-block;
			padding:10px 20px;
		}
		
		input[type="text"], 
		input[type="password"]{
			height: 25px;
			padding: 5px 10px;
			vertical-align: middle;
			display: inline-block;
			border: 1px solid #dddddd;
			border-radius: 2px;
			border-bottom: 2px solid rgb(28,173,228);
		}
		select {
			border: 1px solid #dddddd;
		}
		select,
		input[type="button"], 
		input[type="submit"], 
		input[type="reset"], 
		button, 
		.btn {
			height: 35px;
			padding: 5px 10px;
			border-radius: 2px;
			cursor:pointer;
			font-size:120%;
		}
		
		input[type="button"], 
		input[type="submit"], 
		input[type="reset"], 
		button, 
		.btn {
			border:none;
			background: rgb(28,173,228);
			color:#ffffff;
		}
	  </style>
<head>
<body>
<h1>Zeitmessung</h1>


<!-- Formular für den Input (das User Passwort vor dem Speichern) -->
<form method="POST">
	<input type="text" name="passwort" value="<?php echo isset($_POST['passwort']) ? $_POST['passwort'] : '' ?>">
	<select name="cost">
		<option value="8" <?php echo isset($_POST['cost']) && $_POST['cost']==8 ? 'selected' : '' ?>>8</option>
		<option value="12" <?php echo isset($_POST['cost']) && $_POST['cost']==12 ? 'selected' : '' ?>>12</option>
		<option value="14" <?php echo isset($_POST['cost']) && $_POST['cost']==14 ? 'selected' : '' ?>>14</option>
		<option value="16" <?php echo isset($_POST['cost']) && $_POST['cost']==16 ? 'selected' : '' ?>>16</option>
		<option value="20" <?php echo isset($_POST['cost']) && $_POST['cost']==20 ? 'selected' : '' ?>>20</option>
	</select>
	<input type="submit" value="Hash it!">
</form>
<hr>

<?php
if(isset($_POST['passwort'])){
	$passwort = $_POST['passwort'];
	$cost = $_POST['cost']; 
		
	// Zeitmessung 

	$startzeitPWH = time()+microtime();
	$hs = password_hash($passwort, PASSWORD_DEFAULT);
	$endzeitPWH = time()+microtime();
	$zeitmessungPWH = $endzeitPWH-$startzeitPWH;
	echo '<li>'.$zeitmessungPWH.' sekunden für PASSWORD_DEFAULT</li>';


	$startzeitPWH = time()+microtime();
	$hs = password_hash($passwort, 	PASSWORD_BCRYPT );
	$endzeitPWH = time()+microtime();
	$zeitmessungPWH = $endzeitPWH-$startzeitPWH;
	echo '<li>'.$zeitmessungPWH.' sekunden für PASSWORD_BCRYPT</li>';
	
	$startzeitPWH = time()+microtime();
	$hs = password_hash($passwort, 	PASSWORD_BCRYPT, ["cost" => $cost] );
	$endzeitPWH = time()+microtime();
	$zeitmessungPWH = $endzeitPWH-$startzeitPWH;
	echo '<li>'.$zeitmessungPWH.' sekunden für PASSWORD_BCRYPT mit manuellem key stretching (cost = '.$cost.')</li>';

}
?>