<?php
// Einbinden benötigter Konfigurationsdateien
require_once("../configration.php");
require_once("includes/navdaten.php"); // navigationsdaten als array, nur einmal einbinden

session_name(CONFIG_SESSION_NAME); // Session name anders als standard
session_start(); // Zugriff auf Session geben

require_once('includes/session_check.php'); // geschützter Bereich - erst wird die session überprüft
require_once('includes/mysql-connect.php'); // Datenbankverbindung (Variable $conn)

$isNew = true; // switch für neu / bestehend

// manipulation vor auslesen
if( isset($_POST['ID']) ){
	if( !empty($_POST['ID'])) {
		$isNew = false;
		// update
	}else{
		// insert
	}
}


// bestehenden Beitrag editieren?
if( isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit' ){
	// id ist bekannt, beitrag schon existent -> SELECT mit der ID
	$isNew = false;
	
	$id = $_GET['id'];
	$query = "SELECT * FROM `post` WHERE `ID`=".$id;
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
						<h1>News <?php echo $isNew==true ? 'erstellen' : 'bearbeiten'; ?></h1>
						
					</div>
					<div class="col-8">
						<form method="POST">
						  <div class="form-group mb-3">
							<label>Titel</label>
							<input type="text" name="titel" class="form-control" value="<?php echo $datensatz['titel'] ?>">
						  </div>
						  <div class="form-group mb-3">
							<label>Daum</label>
							<input type="text" name="titel" class="form-control" value="24.04.2023">
						  </div>
						  <div class="form-group mb-3">
							<label>Autor</label>
							<select name="user_ID" class="form-control">
								<option value="1">Nico</option>
							</select>
						  </div>
						  <div class="form-group mb-3">
							<label>Intro Text</label>
							<textarea name="short" class="form-control"><?php echo $datensatz['short'] ?></textarea>
						  </div>
						  <div class="form-group mb-3">
							<label>Text</label>
							<textarea name="text" class="form-control"><?php echo $datensatz['text'] ?></textarea>
						  </div>

						  <input type="hidden" name="ID" value="<?php echo $datensatz['ID'] ?>">
						  <button type="submit" class="btn btn-primary">Submit</button>
						  <button type="reset" class="btn btn-light" onclick="location.href='news-liste.php'">Abbrechen</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		
<?php include("html/html-footer.php"); // html footer holen ?>		
