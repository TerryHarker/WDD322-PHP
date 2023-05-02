<?php
/**
 * PHP und JS Validierung zusammen
 */

$hasErrors = false; // Fehler-Status-Variable
$errorMessages = array();

echo '<pre>';
echo 'POST Array:';
print_r($_POST);
print_r($_GET);
echo '</pre>';

// leere Variablen definieren
$firstname = '';
$lastname = '';
$email = '';
$message = '';

// Verarbeitung - nur wenn Formular abgeschickt wurde
if( isset( $_POST['first-name'] ) && isset( $_POST['last-name'] ) && isset($_POST['email']) && isset($_POST['message']) ){
    // echo 'formular wurde abgeschickt';
    
    // Werte bereinigen und adnach nur noch die bereinigten Variablen verwenden:
    $firstname    = strip_tags($_POST['first-name']);
    $lastname     = strip_tags($_POST['last-name']);
    $email        = strip_tags($_POST['email']);
    $message      = strip_tags($_POST['message']);
    

    // Vorname leer?
    if( empty( $firstname ) ){
        // Fehler
        $errorMessages[] = 'Bitte gebe Deinen Vornamen an!';
        $hasErrors = true;
    }
    // Nachname leer?
    if( empty( $lastname ) ){
        // Fehler
        $errorMessages[] = 'Bitte gebe Deinen Nachnamen an!';
        $hasErrors = true;
    }
    // Email leer?
    if( empty( $email ) ){
        // Fehler
        $errorMessages[] = 'Bitte gebe Deine E-Mail Adresse an!';
        $hasErrors = true;
    }
    // Nachricht leer?
    if( empty( $message ) ){
        // Fehler
        $errorMessages[] = 'Bitte schreibe eine Nachricht!';
        $hasErrors = true;
    }
    // Nachricht zu kurz?
    if( strlen( $message )<26 ){
        // Fehler
        $errorMessages[] = 'Bitte schreibe eine Nachricht von mindestens 26 Zeichen';
        $hasErrors = true;
    }
    

    if( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) == false ){
        // Fehler
        $errorMessages[] = 'Bitte gebe ein gültige E-Mail Adresse an!';
        $hasErrors = true;
    }

    // ready für verarbeitung?
    if ($hasErrors == false){
        echo 'verarbeitung ready!';
        header("location: thankyou.html");
    }
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Validation</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/code.js" defer></script>
  </head>
  <body>

  <div>
    <?php 
  if( count($errorMessages)>0 ){
    echo '<span style="color:red;">';
      echo implode( '<br>', $errorMessages ); // array flattening
      echo '</span>';
    }
    ?>
  </div>

  <div>
    <form method="POST" action="index.php">
      <h1>Form Validation</h1>
      <label for="first-name">First Name</label>
      <input type="text" name="first-name" id="first-name" />
      
      <label for="last-name">Last Name</label>
      <input type="text" name="last-name" id="last-name" />
      
      <label for="email">E-Mail</label>
      <input type="text" name="email" id="email" />
      
      <label for="message">Message</label>
      <textarea name="message" id="message"></textarea>
      
      <button type="submit">Submit</button>
    </form>
  </div>

  </body>
  </html>
  