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
<h1>Verschlüsselung</h1>

<!-- Formular für den Input (das User Passwort vor dem Speichern) -->
<form method="POST">
	Passwort: <input type="text" name="passwort" value="<?php echo isset($_POST['passwort']) ? $_POST['passwort'] : '' ?>"><br/>
	Schlüssel: <input type="text" name="schluessel" value="<?php echo isset($_POST['schluessel']) ? $_POST['schluessel'] : '' ?>"><br/>
	<br/>
	<input type="submit" value="Show me!">
</form>

<hr>

<?php
// Hashing des Passwortes mit password_hash() und Ausgabe zur Demonstration -->
if(isset($_POST['passwort'])){
	$plaintextPW = $_POST['passwort'];
	$key = $_POST['schluessel'];
	
	
	// verschlüsselung des Passwortes: 
	$method = 'aes-256-cbc';

	// Wir benötigen einen Hash mit 32 Zeichen (256 bit)
	$key = substr(hash('sha256', $key, true), 0, 32);

	// Wir benötigen einen Initialisierungsvektor mit 16 Zeichen (128 bit)
	$init = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

	$encrPw = base64_encode(openssl_encrypt($plaintextPW, $method, $key, OPENSSL_RAW_DATA, $init));
	$decrPw = openssl_decrypt(base64_decode($encrPw), $method, $key, OPENSSL_RAW_DATA, $init);
	
	
	
	echo '<p>Das Passwort "<strong>'.$plaintextPW.'</strong>" nach Verschlüsselung mit OpenSSL: </p>';
	echo '<p class="box"><strong>'.$encrPw.'</strong></p>';
	echo '<p>Und nach Entschlüsselung mit OpenSSL: </p>';
	echo '<p class="box"><strong>'.$decrPw.'</strong></p>';
}else{
	echo 'gebe ein Passwort ein...';
}
?>

</body>
</html>