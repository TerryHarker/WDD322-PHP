<?php
/*
XSS ist der Versuch, Code (meistens Javascript) über User Input einzuschleusen
Test das Demo mit einem JavaScript:
http://localhost/WDD322-PHP/W3/xss-demo.php?q=%3Cscript%3Ealert(%27Unsicheres%20Script!%27);%3C/script%3E
*/


// Am Anfang (oder im Config File) können wir erlaubte Tags festlegen
$allowed_tags = array(
    'p', 'b', 'strong', 'h3', 'i', 'em'
);

// Ungefiltertes Suchwort aus GET (URL)
$suchwort = $_GET['q'];
echo 'Ohne Filter: '.$suchwort;

// Suchwort gefiltert in Variable speichern - nur noch damit weiterarbeiten!
$suchwort_gesichert = strip_tags($_GET['q']);
echo '<br>Du hast nach "'.$suchwort_gesichert.'" gesucht'; // nur das gesicherte ausgeben

// Suchwort gefiltert, aber es werden die erlaubten Tags ignoriert beim Filtern: 
$suchwort_gesichert = strip_tags($_GET['q'], $allowed_tags);
echo '<br>Du hast nach "'.$suchwort_gesichert.'" gesucht';

// Mögliche Prüfung, wenn man auf versuchte Injection reagieren möchte: 
if($suchwort !== $suchwort_gesichert){
    // der Wert ist vor und  nach dem Filtern nicht gleich - es wurde etwas gefudnen, was rausgefiltert werden musste
    echo '<br>HTML Tags sind nicht erlaubt! Sie wurden gelöscht.';
}

?>