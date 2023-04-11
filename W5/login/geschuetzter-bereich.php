<?php
/**
 * Geschützter Bereich - dieses script soll nur ausgeführt werden, wenn ein User bereits eingeloggt ist.
 * Login-Status prüfen und Massnahmen zur Session-Sicherheit 
 */

 // anderer, nicht-standard Session Cookie Name - macht Session Cookie für viele Malware schwer zu finden. VOR session_start()!
session_name('MEINEIGENERSESSIONNAME'); 

// Session eröffnen oder verbinden  - immer VOR Zugriff auf die Daten der Session notwendig
session_start(); 
echo session_name(); // Session Name (Cookie Name) testweise ausgeben

$isLoggedIn = false; // Loginstatus im Script
$session_lifetime = 10; // Inaktive Session soll auf 10 minuten beschränkt sein - im Projekt ein Config-Wert

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

if( isset($_SESSION['usersession']['isloggedin']) && $_SESSION['usersession']['isloggedin'] == true ){
    // Login-Status ist vorhanden
    $isLoggedIn = true;
}

// Prüfung: IP anders als bei Login? (user agent könnte auch so abgefragt werden)
if( !isset($_SESSION['usersession']['userip']) || $_SESSION['usersession']['userip'] != $_SERVER['REMOTE_ADDR'] ){
    $isLoggedIn = false;
}

// Prüfung: Session abgelaufen?
if( !isset($_SESSION['usersession']['timestamp']) || $_SESSION['usersession']['timestamp']+$session_lifetime*60 < time() ){
    // timestamp + session lifetime sind älter als jetzt - session zu alt!
    $isLoggedIn = false;
}

// Loginstatus nach Prüfungen...
if($isLoggedIn !== true ){
    // Loginstatus ist nicht mehr "true" - kein Zugriff gewähren!!!

    // Usersession Infos aus Session Array löschen
    unset($_SESSION['usersession']); 

    // umleiten auf login
    header("location: login.php");
    exit; // Script wird nach dieser Zeile nicht weiter ausgeführt.
}

// Nach überstandener Sessionprüfung - refresh
$_SESSION['usersession']['timestamp'] = time(); // aktuelle Zeit in Timestamp speichern (damit die Session nicht abläuft)
session_regenerate_id(); // Session ID (Wert des Session Cookies) ändern (damit würde eine geklaute Session-ID ungültig)
?>
<h1>Willkommen in der App</h1>

<a href="logout.php">abmelden</a>