<?php
/**
 * Das Logout Script - wird nur aufgerufen, wenn sich jemand abmeldet. 
 * Alternativ könnte dieser Code mit einem GET-Parameter (?action=logout) auch in anderen Scripts ausgeführt werden... 
 */
session_name('MEINEIGENERSESSIONNAME'); // anderer, nicht-standard Session Cookie Name
session_start(); // Auf Session zugreifen
unset($_SESSION['usersession']); // Usersession Infos aus Session Array löschen
session_regenerate_id(); // Session ID erneuern
header("location: login.php");
?>