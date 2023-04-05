<?php
/*
PHPMailer Klasse Verwenden
Diese Klasse ist eine Art Funktionserweiterung für PHP, die uns einfach ermöglicht
- Mails aus einem selbstdefinierten (auch Remote) Postausgangsserver zu verschicken, 
  statt uns auf den lokal konfigurierten Mailserver zu verlassen
- mit wenig Aufwand Mails mit Attachment oder Multipart (HTML- und Plaintext Version) zu schicken
- Den Sendeprozess durch Debugging/Monitoring zu "sehen"

Du kannst PHPMailer mit Composer in jedem Ordner auf deinem Localhost installieren
Du findest die Anleitung und diverse Beispiele auf github: https://github.com/PHPMailer/PHPMailer
Beispiele für die Anwendung: https://github.com/PHPMailer/PHPMailer/tree/master/examples
*/

// Namespace definieren - damit Funktionen aus verschiedenen hinzugeladenen Libraries sich nicht überschreiben können, falls sie den gleichen Namen haben
use PHPMailer\PHPMailer\PHPMailer; // Namespace "PHPMailer" nutzen
use PHPMailer\PHPMailer\Exception; // Namespace "Exception" nutzen (->PHPMailer verwendet Exception)

require 'vendor/autoload.php';  // generiertes autoload File laden - hier drin wird dafür gesorgt, dass alle benötigten Funktionen auf einmal geladen werden
require 'config.php';           // unser config script laden - von hier bezehen wir unsere SMTP Verbindungsdaten 
// echo 'SMTP Host: '.SMTP_HOST;  // test, um zu sehen, ob die Konstanten aus Config.php zur Verfügung stehen

// Variablen mit initialwerten definieren - diese benötigen wir im ganzen Script, auch im HTML
$name = '';
$email = '';
$nachricht = '';

// Prüfen, ob Formulardaten zur Verfügung stehen: 
if( isset($_POST['form_name']) && $_POST['form_name']=='contactform-xyz' ){
    // formular wurde abgeschickt - validieren nicht vergessen (hier nur zu Demozwecken weggelassen)
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nachricht = $_POST['nachricht'];

    // Jetzt instanzieren wir einen PHPMailer (wir erwecken ihn so zum leben)
    $mailer = new PHPMailer();  // unsere PHPMailer Instanz in diesem Script 
    $mailer->SMTPDebug = 2;     // Serverkommunikation anzeigen lassen - dies ist wichtig während dem Entwickeln, um zu sehen, wo ein Fehler geschieht beim versenden
    $mailer->isSMTP();          // einen SMTP Server zum Versand benutzen
    
    // dem PHPMailer die SMTP-Infos mitteilen
    $mailer->Host = SMTP_HOST;
    $mailer->Port = SMTP_PORT;
    $mailer->Username = SMTP_USER;
    $mailer->Password = SMTP_PASSWORD;
    $mailer->SMTPSecure = SMTP_SECURE;
    $mailer->SMTPAuth = SMTP_AUTH;

    // Mail header vorbereiten
    $mailer->setFrom('terry.harker@bytekultur.net', 'Terry Harker'); // Absender definieren
    $mailer->addAddress('citystrolch@gmail.com', 'Terry Privat');   // Empfänger definieren
    $mailer->addReplyTo($email, $name); // Antwortadresse hinzufügen, wenn diese anders sein soll als der Absender

    // Mail vorbereiten
    $mailer->Subject = 'Mail aus dem PHPMailer'; // Betreff definieren
    $mailer->Body = $nachricht; // Mailbody (eigentliche Mailnachricht) definieren - hier aus dem Userinput der Textarea
    
    // mail senden
    $mailer->send();

    // Möglichkeit, einen Fehler zu erkennen und auszugeben:
    if( strlen($mailer->ErrorInfo)>0){
        echo 'Fehler: '.$mailer->ErrorInfo;
    }else{
        echo "Danke für deine Kontaktaufnahme, Dein Mail wurde versendet";
    }
}

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