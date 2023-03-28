<?php
$hasErrors = false; // Fehler-Status-Variable
$errorMessages = array();

echo '<pre>';
echo 'POST Array:';
print_r($_POST);
echo '</pre>';

// leere Variablen definieren
$benutzername = '';
$email = '';
$password = '';

// Verarbeitung - nur wenn Formular abgeschickt wurde
if( isset( $_POST['benutzername'] ) && isset( $_POST['password'] ) && isset($_POST['password_test']) ){
    // echo 'formular wurde abgeschickt';
    
    // Werte bereinigen und adnach nur noch die bereinigten Variablen verwenden:
    $benutzername   = strip_tags($_POST['benutzername']);
    $email          = strip_tags($_POST['email']);
    $password       = $_POST['password']; // keine Input-Filterung!
    $password_test  = $_POST['password_test']; // keine Input-Filterung!


    // Benutzername leer?
    if( empty( $benutzername ) ){
        // Fehler
        $errorMessages['benutzername'] = 'Bitte gebe einen Benutzernamen an!';
        $hasErrors = true;
    }
    // Benutzername leer?
    if( empty( $password ) ){
        // Fehler
        $errorMessages['password'] = 'Das Passwortfeld darf nicht leer sein!';
        $hasErrors = true;
    }

    if( empty($_POST['password_test']) || $_POST['password'] !== $_POST['password_test'] ){
        // Fehler
        $errorMessages['password_test'] = 'Bitte gib zweimal das selbe Passwort ein!';
        $hasErrors = true;
    }

    if( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) == false ){
        // Fehler
        $errorMessages['email'] = 'Bitte gib ein gültige E-Mail Adresse an!';
        $hasErrors = true;
    }


    // ready für verarbeitung?
    if ($hasErrors == false){
        echo 'verarbeitung ready!';
    }
}

?>
<form action="" method="POST">

<?php 
if( count($errorMessages)>0 ){
    echo '<span style="color:red;">';
    echo implode( '<br>', $errorMessages ); // array flattening
    echo '</span>';
}
?>

<div>
		<label>Benutzername *</label> <br>
		<input type="text" name="benutzername" value="<?php echo $benutzername; ?>" >
        <?php
        if( !empty($errorMessages['benutzername']) ){
            echo '<span style="color:red;">'.$errorMessages['benutzername'].'</span>';
        }
        ?>
	</div>
	<div>
		<label>E-Mail *</label> <br>
		<input type="text" name="email" value="">
	</div>
	<div>
		<label>Passwort *</label> <br>
		<input type="password" name="password" >
	</div>
	<div>
		<label>Passwort wiederholen*</label> <br>
		<input type="password" name="password_test" >
	</div>
	
	<div>
		<input type="submit" value="Registrieren">
	</div>
</form>