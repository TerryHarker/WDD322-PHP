<?php
// Einbinden benötigter Konfigurationsdateien
require_once("../configration.php");
require_once("includes/navdaten.php"); // navigationsdaten als array, nur einmal einbinden

session_name(CONFIG_SESSION_NAME); // Session name anders als standard
session_start(); // Zugriff auf Session geben

require_once('includes/session_check.php'); // geschützter Bereich - erst wird die session überprüft
require_once('includes/mysql-connect.php'); // Datenbankverbindung (Variable $dbo)

// manipulation vor auslesen
if( isset($_POST['ID']) ){
	if( !empty($_POST['ID'])) {
		// update
	}else{
		// insert
	}
}


// bestehenden Beitrag editieren?
if( isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit' ){
	// id ist bekannt, beitrag schon existent -> SELECT mit der ID
	$id = $_GET['id'];
	$query = "SELECT * FROM `content` WHERE `ID`=".$id;
	$statement = $dbo->query( $query, PDO::FETCH_ASSOC ); 
	$datensatz = $statement->fetch(); // nur einen Datensatz holen

	print_r($datensatz);
}

?>

<?php include("html/html-header.php"); // html header und navbar holen ?>

		<section>
			<div class="container">
				
				<div class="row mt-4">
					<div class="col-8">
						<h1>Seitentext bearbeiten</h1>
						
					</div>
					<div class="col-8">
						<form method="POST">
						  <div class="form-group mb-3">
							<label>Titel</label>
							<input type="text" name="titel" class="form-control" value="<?php echo $datensatz['titel'] ?>">
						  </div>
						  <div class="form-group mb-3">
							<label>Text</label>
							<textarea name="text" class="form-control"><?php echo $datensatz['text'] ?></textarea>
						  </div>
						 
						  <button type="submit" class="btn btn-primary">Submit</button>
						  <button type="reset" class="btn btn-light" onclick="location.href='seiten-liste.php'">Abbrechen</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		
<?php include("html/html-footer.php"); // html footer holen ?>		
