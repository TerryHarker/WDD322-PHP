<?php
// Einbinden benötigter Konfigurationsdateien
require_once("../configration.php");
require_once("includes/navdaten.php"); // navigationsdaten als array, nur einmal einbinden

session_name(CONFIG_SESSION_NAME); // Session name anders als standard
session_start();

require_once('includes/session_check.php'); // geschützter Bereich - erst wird die session überprüft

?>

<?php include("html/html-header.php"); // html header und navbar holen ?>

		<section>
			<div class="container">
				<div class="mt-3">
					<h1>Mein Profil bearbeiten</h1>
					<?php if( isset($errormessage) ) { ?>
					<div class="alert alert-danger" role="alert">
					  <?php echo $errormessage; ?>
					</div>
					<?php } ?>
					<form method="POST">
					  <div class="form-group mb-3">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Dein Name">
					  </div>
					  <div class="form-group mb-3">
						<label for="exampleInputEmail1">Email-adresse</label>
						<input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Deine E-Mail">
					  </div>
					  <div class="form-group mb-3">
						<label for="exampleInputPassword1">Passwort</label>
						<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Passwort">
					  </div>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</section>
		
<?php include("html/html-footer.php"); // html footer holen ?>		
