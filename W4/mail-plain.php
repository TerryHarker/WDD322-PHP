<?php
$hasErrors = false;
$errorMessages = array();

$name = '';
$email = '';
$nachricht = '';

if( isset($_POST['name'], $_POST['email'], $_POST['nachricht']) ){
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $nachricht = strip_tags($_POST['nachricht']);
    
    // ready für validierung
    if( empty($name) || empty($email) || empty($nachricht) ){
        $hasErrors = true;
        $errorMessages[] = 'Bitte alle Felder ausfüllen';
    }
    // ...und weitere validierungen...
    

    if( $hasErrors == false ){
        // mail versenden
        $empfaenger = 'citystrolch@gmail.com';
        $betreff = 'Mail aus dem PHP Script';
        $message = "Diese Mail haben wir aus dem Script versendet:\n\n".$nachricht."\n\nViele Grüsse, das PHP Script ;-)";
        
        // Header vorbereiten (Metadaten) - hier als concatenated string
        $headers = "From: noreply@bytekultur.net";
        $headers .= "Reply-to: ".$email;
        $headers .= "Content-type: text/plain; charset=iso-8859-1";

        $mailSent = mail($empfaenger, $betreff, $message, $headers);
        if( $mailSent == true){
            $successMessage = 'Danke, '.$name.', Mail wurde verschickt';
        }else{
            $errorMessages[] = 'Konnte das mail nicht verschicken';
        }
    }
}

?>
<html>
    <head>
        <style> body { font-family:Arial, Helvetica, sans-serif;} </style>
    </head>
<body>
<h1>Schreibe mir!</h1>
<em>Dies ist ein einfaches Kontaktformular mit php mail() funktion. Es verschickt ein Plain Text E-Mail</em>
<?php
if( count($errorMessages) ){
    echo '<p style="color:red">'.implode('<br>', $errorMessages).'</p>';
}
?>
<br><br><hr>
<?php if( isset($successMessage) ) {
    echo $successMessage;
}else{
?>
<form method="POST" action="">
    <div>
		<label>Dein Name *</label> <br>
		<input type="text" name="name" value="<?php echo $name; ?>" >
        
	</div>
	<div>
		<label>E-Mail *</label> <br>
		<input type="text" name="email" value="<?php echo $email; ?>">
	</div>
	<div>
		<label>Deine Nachricht *</label> <br>
		<textarea name="nachricht"><?php echo $nachricht; ?></textarea>
	</div>
	
	<div>
		<input type="submit" value="Mail senden" name="action">
        <input type="hidden" name="form_name" value="contactform-xyz">
	</div>
</form>
<?php
}
?>
</body>
</html>