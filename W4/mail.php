<?php
$hasErrors = false;
$errorMessages = array();

$name = '';
$email = '';
$nachricht = '';

if( isset($_POST['name'], $_POST['email'], $_POST['nachricht']) ){
    // ready für validierung
    if( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['nachricht']) ){
        $hasErrors = true;
        $errorMessages[] = 'Bitte alle Felder ausfüllen';
    }
    // ...und weitere validierungen...
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nachricht = $_POST['nachricht'];

    if( $hasErrors == false ){
        // mail versenden
        $empfaenger = 'citystrolch@gmail.com';
        $betreff = 'Mail aus dem PHP Script';
        $message = "Diese Mail haben wir aus dem Script versendet:<br><br>".nl2br($nachricht)."<br><br>Viele Grüsse, das PHP Script ;-)";
        $headers = "From: info@bytekultur.net\n";
        $headers .= "Reply-to: ".$email."\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";

        $mailSent = mail($empfaenger, $betreff, $message, $headers);
        if( $mailSent == true){
            $successMessage = 'Danke, '.$name.', Mail wurde verschickt';
            // header("Location: test.php");
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
<em>Dies ist ein einfaches Kontaktformular mit php mail() funktion</em>
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