<?php
/**
 * Login - hier wird die Authentifizierung gemacht (User ist noch nicht eingeloggt)
 */
session_name('MEINEIGENERSESSIONNAME'); // anderer nicht standard Session Cookie Name
session_start(); // Sessionzugriff ermöglichen


// demo Userdaten (kommen später aus der Datenbank)
$benutzername_gespeichert = 'terry@bytekultur.net';
$passwort_gespeichert = '$2y$10$aoc/wu5i6HuQA0RGpLvaHOK/0J0ca7IjtmhYPFyjuWJcZ8naYOPJq'; // hash von test1234


echo '<pre> POST ';
print_r($_POST);
echo '</pre>';

if( isset($_POST['benutzername'], $_POST['passwort']) ){
	// formular abgeschickt - username & passwort prüfen
	if( $_POST['benutzername'] == $benutzername_gespeichert && password_verify($_POST['passwort'], $passwort_gespeichert) == true ){
		// login ist korrekt - loginstatus speichern
		$_SESSION['usersession']['isloggedin'] = true;
		$_SESSION['usersession']['userip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['usersession']['timestamp'] = time();

		// alles gespeichert - umleiten auf App
		header("location: geschuetzter-bereich.php");
	}else{
		// login nicht korrekt - Fehlermeldung vorbereiten
		$errorMessage = 'Login nicht korrekt';
	}
}

echo '<pre> SESSION ';
print_r($_SESSION);
echo '</pre>';


?>
<h3>Login</h3>
<?php
// kurzschreibweise für IF/ELSE: 
echo isset($errorMessage)? '<span style="color:red">'.$errorMessage.'</span>':'';

// Noch kürzere Schreibweise für $errorMessage nur ausgeben, wenn sie existiert
// echo $errorMessage ?? ''; 
?>
<form action="" method="POST">
	<div>
		<input type="text" name="benutzername" size="18" placeholder="Benutzername">
	</div>
	<div>
		<input type="password" name="passwort" size="18" placeholder="Passwort">
	</div>
	<div>
		<button value="Einloggen" name="Submit" type="submit">Einloggen</button>
	
	</div>
</form>