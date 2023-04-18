<?php
/**
 * Einfaches Beispiel, wie PHP mit dem DB Server kommuniziert.
 * query() erklärt: https://www.php.net/manual/de/pdo.query.php
 */

// DB Verbindungsdaten (config)
$dbserver = 'localhost';  // gleicher server wie mein Script
$dbuser = 'root'; // root user für MAMP und XAMPP
$dbpasswort = ''; // XAMPP: leer, MAMP: root
$dbname = 'wdd0322_blog';

// PDO Objekt instanzieren - das Objekt erhält gleich einen Verbindungs-String von uns, um sich mit dem DB Server und der DB zu verbinden 
$meinDBObjekt = new PDO('mysql:host='.$dbserver.';dbname='.$dbname, $dbuser, $dbpasswort);


// MySQL Befehl als String erstellen (PHP versteht kein MySQL, wir bereiten den Befehl nur vor, um ihn dem DB Server zu schicken)
$sql_befehl = "SELECT * FROM `blogpost`"; 

// query() sendet eine Anfrage an den DB server. Der SQL Befehl wird als Parameter mitgegeben.
// dabei gibt das DB Objekt als Rückgabewert einen Datensatz zurück (wir speichern in in $datensatz)
// dabei merkt sich das DB Objekt auch, welchen Datensatz es zurückgegeben hat, und wird beim nächsten Ausführen den nächsten zurückgeben, deswegen können wir mit foreach() arbeiten

foreach ( $meinDBObjekt->query( $sql_befehl, PDO::FETCH_ASSOC ) as $datensatz ){ 
    // foreach loop läuft automatisch nur so lange, bis keine Datensätze mehr vorhanden sind, ähnlich wie beim Array
    echo '<pre>';
    print_r( $datensatz );
    echo '</pre>';
}

/**
 * query() könnte auch verwendet werden, um einen INSERT, UPDATE oder DELETE Befehl zu schicken.
 * Dann wird jedoch kein Loop gebraucht, query sendet den befehl, und dieser wird direkt ausgeführt
 * Du kannst es testen, in dem du dieses script ausführst und 
 */
$create_befehl = "INSERT INTO `blogpost` (`post_title`) VALUES ('Test aus PHP Script')";
$created = $meinDBObjekt->query( $create_befehl );
if($created !== false){
    echo 'Es wurde ein neuer Blogpost mit dem Titel "Test aus PHP Script" erstellt - schau in der Datenbank nach!';
}
?>