<?php
// Einbinden benötigter Konfigurationsdateien
require_once("../configration.php");
require_once("includes/navdaten.php"); // navigationsdaten als array, nur einmal einbinden

session_name(CONFIG_SESSION_NAME); // Session name anders als standard
session_start(); // Zugriff auf Session geben

require_once('includes/session_check.php'); // geschützter Bereich - erst wird die session überprüft

?>

<?php include("html/html-header.php"); // html header und navbar holen ?>

		<section>
			<div class="container">
				
				<div class="row mt-4">
					<div class="col-8">
						<h1>Willkommen <?php echo $_SESSION['username'] ?></h1>
						<p>Adminbereich...</p>
					</div>
					
				</div>
			</div>
		</section>
		
<?php include("html/html-footer.php"); // html footer holen ?>		
