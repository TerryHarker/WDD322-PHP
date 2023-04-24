<?php
// Verbinden und auswählen der Datenbank (notwendiger erster Schritt)
$dbo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USER, DB_PASSWORT);

?>