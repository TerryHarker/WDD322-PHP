<?php
// Konfiguration der Umgebung
$locale = 'de_DE';
$timezone = 'CET'; // GMT = Grenwich Time, CET = GMT+2 (Central EU Time Sommerzeit) oder GMT+1 (Central EU Time Winterzeit)
$dateType = IntlDateFormatter::FULL; // Formatierungsform (lang, kurz, komplett etc.)
$timeType = IntlDateFormatter::FULL; // Formatierungsform (lang, kurz, komplett etc.)
$calendar = IntlDateFormatter::GREGORIAN; // Kalender - GREGORIAN ist der STandard, es gäbe noch weitere wie z.B. den buddhistischen Kalender

// SESSION CONFIG
define('CONFIG_SESSION_NAME', 'KSDJG87YX'); // Name des Session Cookies, damit es nicht PHPSESSID heisst
define('CONFIG_SESSION_LIFETIME', 3600); //  Gültigkeit der Session in Sekunden

// DB Config
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORT', ''); // bei MAMP: root
define('DB_NAME', 'wdd0322_nico'); // Dein DB Name
?>