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
					<div class="col-8">
						<h1>Mein Profil</h1>
						<table class="table">
						  <tbody>
							<tr>
							  <th scope="row">Username: </th>
							  <td>Admin</td>
							</tr>
							<tr>
							  <th scope="row">E-Mail: </th>
							  <td>terry@bytekultur.net</td>
							</tr>
							<tr>
							  <th scope="row">Passwort: </th>
							  <td>******</td>
							</tr>
						  </tbody>
						</table>
						<a href="profil-edit.php" class="btn btn-primary">Bearbeiten</a>
					</div>
				</div>
			</div>
		</section>
		
<?php include("html/html-footer.php"); // html footer holen ?>		
