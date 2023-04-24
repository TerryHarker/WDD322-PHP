<?php
// Einbinden benötigter Konfigurationsdateien
require_once("../configration.php");
require_once("includes/navdaten.php"); // navigationsdaten als array, nur einmal einbinden

session_name(CONFIG_SESSION_NAME); // Session name anders als standard
session_start();

require_once('includes/mysql-connect.php'); // ab hier haben wir verbindung zur DB

$isLoggedIn = false; 

// formular abgeschickt?
if ( isset($_POST['username']) && isset($_POST['password']) ) {
	
	// Admin User in DB suchen, der die angegebene E-Mail hat: 
	$query = "SELECT * FROM `user` WHERE `email` = '".$_POST['username']."' AND `usergroup` = 1";

	// echo $query;
	$statement = $dbo->query( $query, PDO::FETCH_ASSOC ); // Query / Befehl and den DB Server senden (Bestellung)
	$datensatz = $statement->fetch();

	if( empty($datensatz) ){
		$errormessage = 'Benutzername oder passwort nicht korrekt';
	}else{
		
		echo '<pre>';
		print_r( $datensatz );
		echo '</pre>';
		
		// Passwort überprüfen
		if( password_verify($_POST['password'], $datensatz['passwort']) ){

			// Loginstatus speichern
			$_SESSION['isloggedin'] = true;
			$_SESSION['username'] = $datensatz['username'];
			$_SESSION['userID'] = $datensatz['ID']; // ID für jegliche Userdaten, die wir später brauchen
			
			$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
			$_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['timestamp'] = time();
			
			// echo 'du bist eingeloggt';
			header("Location: index.php");
		}else{
			$errormessage = 'Benutzername oder passwort nicht korrekt';
		}
	}
	
}
?>

<?php include("html/html-header.php"); // html header und navbar holen ?>

		<section>
			<div class="container">
				<div class="mt-3">
					<h1>Bitte anmelden</h1>
					<?php if( isset($errormessage) ) { ?>
					<div class="alert alert-danger" role="alert">
					  <?php echo $errormessage; ?>
					</div>
					<?php } ?>
					<form method="POST">
					  <div class="form-group mb-3">
						<label for="exampleInputEmail1">Email address</label>
						<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					  </div>
					  <div class="form-group mb-3">
						<label for="exampleInputPassword1">Passwort</label>
						<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					  </div>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</section>
		
<?php include("html/html-footer.php"); // html footer holen ?>		
