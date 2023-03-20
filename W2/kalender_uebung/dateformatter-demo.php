<?php
/*
Date Formatter Klasse - zum Formatieren des SERVER-Datums:
- INTL Date Formatter Manual: https://www.php.net/manual/de/intldateformatter.format.php
- Formate Liste: https://unicode-org.github.io/icu/userguide/format_parse/datetime/#datetime-format-syntax
*/


// Konfiguration der Umgebung
$locale = 'de_DE';
$timezone = 'CET'; // GMT = Grenwich Time, CET = GMT+2 (Central EU Time Sommerzeit) oder GMT+1 (Central EU Time Winterzeit)
$dateType = IntlDateFormatter::FULL; // Formatierungsform (lang, kurz, komplett etc.)
$timeType = IntlDateFormatter::FULL; // Formatierungsform (lang, kurz, komplett etc.)
$calendar = IntlDateFormatter::GREGORIAN; // Kalender - GREGORIAN ist der STandard, es gäbe noch weitere wie z.B. den buddhistischen Kalender


// Vorbereitung der Strings in Variablen für die Ausgabe - es werden Datumsobjekte erstellt, welche schon die Formatierung enthalten
$fmt_wochentag = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'cccc');
$fmt_monat = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'MM');
$fmt_tag = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'dd');
$fmt_jahr = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'YYYY');
$fmt_zeit = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'HH:mm:ss');

// Ausgabe der Strings 
?>

<h3>Demo: Datums- und Zeitangaben in PHP 8 / 9</h3>

<?php
echo 'wochentag: '.datefmt_format($fmt_wochentag, time());
echo '<br>';
echo 'monat: '.datefmt_format($fmt_monat, time());
echo '<br>';
echo 'tag: '.datefmt_format($fmt_tag, time());
echo '<br>';
echo 'jahr: '.datefmt_format($fmt_jahr, time());
echo '<br>';
echo 'zeit: '.datefmt_format($fmt_zeit, time()).' Uhr';
?>