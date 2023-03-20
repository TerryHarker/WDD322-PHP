<?php
define('SPRACHE', 'de'); // Konstante (kann nicht überschrieben werden)
define('DEBUG', true); // debugging mode schalter


// Vorbereitung
$wochentag = 'Montag'; // String in Variable


// Testausgabe, die nur im Debug Modus gemacht wird: 
if( DEBUG == true ){
    echo $wochentag;
}


// Ausgabe (HTML):
?>
<html>
    <head></head>
    <body>
        <?php echo SPRACHE; ?>
        <p>Hallo, heute ist <?php echo $wochentag; ?></p>
        <p>
            Einfache Anführungszeichen: 
            <?php
            echo 'Heute ist:\n $wochentag'; // wörtlich
            ?>
        </p>
        <p>Doppelte Anführungszeichen: 
            <?php
            echo "Heute ist:\n $wochentag"; // interpretiert
            ?>
        </p>
    </body>
</html>