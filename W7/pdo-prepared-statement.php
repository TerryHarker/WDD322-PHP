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
if ( isset($_GET['id']) ){

    // $sql_befehl = "SELECT * FROM `blogpost` WHERE `ID`= ".$_GET['id']; 
    $sql_befehl = "SELECT * FROM `blogpost` WHERE `ID`= ? "; // Platzhalter "?" wird erst später mit Daten ersetzt
    
    // $statement = $meinDBObjekt->prepare( $sql_befehl ); // query() schickt direkt einen kompletten befehl, der gleich ausgeführt wird 
    $prepared_statement = $meinDBObjekt->prepare( $sql_befehl ); // prepare() schickt den Befehl ohne Daten, damit die Aktion dem Server schon bekannt ist, bevor er User Input entgegennehmen kann 
    $prepared_statement->execute( $_GET['id'] );
    $blogpost = $prepared_statement->fetch();

    echo '<pre>';
    echo  'dieser Datensatz wurde gefunden: ';
    print_r($blogpost);
    echo '</pre>';
    
}else{
    echo '<p><strong>Es ist keine ID vorhanden, um einen Datensatz auszulesen, schicke im URL eine ID mit, z.B. ?id=3</strong></p>';
}

?>