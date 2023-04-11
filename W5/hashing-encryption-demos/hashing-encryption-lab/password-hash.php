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
		input[type="button"], 
		input[type="submit"], 
		input[type="reset"], 
		button, 
		.btn {
			height: 35px;
			padding: 5px 10px;
			border-radius: 2px;
			border:none;
			background: rgb(28,173,228);
			color:#ffffff;
			cursor:pointer;
			font-size:120%;
		}
	  </style>
<head>
<body>
<h1>Hashing / Salting mit password_hash()</h1>


<!-- Formular für den Input (das User Passwort vor dem Speichern) -->
<form method="POST">
	<input type="text" name="passwort" value="<?php echo isset($_POST['passwort']) ? $_POST['passwort'] : '' ?>">
	<input type="submit" value="Hash it!">
</form>
<hr>

<?php
// Hashing des Passwortes mit password_hash() und Ausgabe zur Demonstration -->
if(isset($_POST['passwort'])){
	$passwort = $_POST['passwort'];
	$hs = password_hash($passwort, PASSWORD_DEFAULT);
	echo '<p>Das Passwort "<strong>'.$passwort.'</strong>" hat folgenden Hash ergeben: </p>';
	echo '<p class="box"><strong>'.$hs.'</strong></p>';
}else{
	echo 'gebe ein Passwort ein...';
}
?>

</body>
</html>