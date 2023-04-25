<?php
// Einbinden benötigter Konfigurationsdateien
require_once("../configration.php");
require_once("includes/navdaten.php"); // navigationsdaten als array, nur einmal einbinden

session_name(CONFIG_SESSION_NAME); // Session name anders als standard
session_start(); // Zugriff auf Session geben

require_once('includes/session_check.php'); // geschützter Bereich - erst wird die session überprüft
require_once('includes/mysql-connect.php'); // Datenbankverbindung (Variable $dbo)


// Zuest manipulation
if( isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete' ){
	$id = $_GET['id'];
	$loeschen_query = "DELETE FROM `post` WHERE `ID` = ?";
	// $dbo->query( $loeschen_query );
	$statement = $dbo->prepare( $loeschen_query );
	$statement->execute( $id );
}

// dann Datenbestand holen
$query = "SELECT * FROM `post`";
$statement = $dbo->query( $query, PDO::FETCH_ASSOC ); 
$daten = $statement->fetchAll();


// print_r($daten);

?>

<?php include("html/html-header.php"); // html header und navbar holen ?>

		<section>
			<div class="container">
				
				<div class="row mt-4">
					<div class="col-8">
						<h1>News</h1>
						
					</div>
					<div class="col-8">
						<a href="news-edit.php" class="btn btn-primary">+ News erstellen</a>

						<table class="table">
						<thead>
							<tr>
							<th scope="col">ID</th>
							<th scope="col">Titel</th>
							<th scope="col">Erstellt</th>
							<th scope="col"></th>
							<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($daten as $datensatz){ ?>
							<tr>
								<th scope="row"><?php echo $datensatz['ID'] ?></th>
								<td><?php echo $datensatz['titel'] ?></td>
								<td><?php echo $datensatz['datum'] ?></td>
								<td><a href="news-edit.php?id=<?php echo $datensatz['ID'] ?>&action=edit">Bearbeiten</a></td>
								<td><a href="news-liste.php?id=<?php echo $datensatz['ID'] ?>&action=delete">Löschen</a></td>
							</tr>
							<?php } ?>
							
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
		
<?php include("html/html-footer.php"); // html footer holen ?>		
