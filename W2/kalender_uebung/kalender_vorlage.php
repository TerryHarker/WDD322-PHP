<?php
// Konfiguration der Umgebung
$locale = 'en_GB';
$timezone = 'CET'; // GMT = Grenwich Time, CET = GMT+2 (Central EU Time Sommerzeit) oder GMT+1 (Central EU Time Winterzeit)
$dateType = IntlDateFormatter::FULL; // Formatierungsform (lang, kurz, komplett etc.)
$timeType = IntlDateFormatter::FULL; // Formatierungsform (lang, kurz, komplett etc.)
$calendar = IntlDateFormatter::GREGORIAN; // Kalender - GREGORIAN ist der STandard, es gäbe noch weitere wie z.B. den buddhistischen Kalender

$aktuellerTimeStamp = time();
echo 'aktueller timestamp: '.$aktuellerTimeStamp;

$fmt_wochentag = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'cccc');
$wochentag = datefmt_format( $fmt_wochentag, $aktuellerTimeStamp );

$format_tagdesmonats = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'dd');
$tagdesmonats = datefmt_format($format_tagdesmonats, $aktuellerTimeStamp);

$format_monat = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'MMM');
$monat = datefmt_format($format_monat, $aktuellerTimeStamp);

$format_jahr = datefmt_create( $locale, $dateType, $timeType, $timezone, $calendar, 'y');
$jahr = datefmt_format( $format_jahr, $aktuellerTimeStamp);

?>
<html>
<head>
	<title>MINI KALENDER</title>
</head>
<body>

<h3 style="color:#999999;">MINI KALENDER</h3>
<div style="border:1px solid black;border-top:5px solid #000000; width:200px; height:250px;text-align:center;">

	<h2><?php echo $wochentag; ?></h2>
	
	<span style="font-size:100px;font-weight:bold;"><?php echo $tagdesmonats; ?></span>
	
	<h2><?php echo $monat; ?> <?php echo $jahr; ?></h2>
	
</div>

</body>
</html>