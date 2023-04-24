<?php
require_once("../configration.php");
session_name(CONFIG_SESSION_NAME); // Session name anders als standard
session_start(); // Zugriff auf Session geben

// Logout - die Session wird geleert / zurückgesetzt
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
	
?>