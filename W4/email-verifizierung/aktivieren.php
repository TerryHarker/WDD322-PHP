<?php
// Aktivierungslink führt hierher
$aktivierungsHash = '';

if( empty($_GET['activate']) ){
    echo 'Dieser Link ist nicht oder nicht mehr gültig';
}else{
    // wir haben ein Token - aktivieren versuchen
    echo 'Danke, dein Kotno ist jetzt aktiviert';
}
?>