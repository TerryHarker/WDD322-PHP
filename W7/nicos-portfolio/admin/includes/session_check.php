<?php
/* SESSION CHECK * * * * * * * * * * * * * * * * * * */
$sessioncheck = true;

// zuerst loginstatus prüfen
if( !isset($_SESSION['isloggedin']) ){
	// achtung, der user ist nicht eingeloggt
	$sessioncheck = false; 
}

$aktuellerUseragent = $_SERVER['HTTP_USER_AGENT'];
if( !isset($_SESSION['useragent']) || $_SESSION['useragent'] !== $aktuellerUseragent ){
	// achtung, der user ist nicht eingeloggt
	$sessioncheck = false; 
}
$aktuelleIP = $_SERVER['REMOTE_ADDR'];
if( !isset($_SESSION['userip']) || $_SESSION['userip'] !== $aktuelleIP ){
	// achtung, der user ist nicht eingeloggt
	$sessioncheck = false; 
}

if( !isset($_SESSION['timestamp']) || $_SESSION['timestamp'] < time()-CONFIG_SESSION_LIFETIME ){
	// session zu alt / zu lange inaktiv
	$sessioncheck = false; 
}

// ist die session ok oder nicht?
if( $sessioncheck == false ){
	// Session ID erneuern
	session_regenerate_id(); 
	
	// session einträge löschen (stattdessen die ganze Session löschen geht auch, aber nur, wenn nicht noch andere Infos drin stehen, die erhalten bleiben sollen, wie z.b. der Warenkorb...)
	unset($_SESSION['isloggedin']);
	unset($_SESSION['username']);
	unset($_SESSION['userID']);
	unset($_SESSION['useragent']);
	unset($_SESSION['userip']);
	unset($_SESSION['timestamp']);
	
	header("Location: login.php");
	exit(); // script abbrechen
	$isLoggedIn = false; // statt Umleitung kann auch eine Statusvariable genutzt werden, wenn nicht die ganzen Scripts vor Zugriff geschützt sein sollten
}else{
	$isLoggedIn = true; // zum prüfen für bereiche, die nur nach Login sichtbar werden.
}

// am schluss, wenn sessionprüfung erfolgreich
$_SESSION['timestamp'] = time(); // timestamp erneuern
session_regenerate_id(); // Session ID erneuern
/* SESSION CHECK ENDE * * * * * * * * * * * * * * * */
?>