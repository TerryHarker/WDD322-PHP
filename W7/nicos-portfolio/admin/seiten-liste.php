<?php
// Einbinden benötigter Konfigurationsdateien
require_once("../configration.php");
require_once("includes/navdaten.php"); // navigationsdaten als array, nur einmal einbinden

session_name( CONFIG_SESSION_NAME ); // Session name anders als standard
session_start(); // Zugriff auf Session geben

require_once('includes/session_check.php'); // geschützter Bereich - erst wird die session überprüft
require_once('includes/mysql-connect.php'); // ab hier haben wir verbindung zur DB

// dann Datenbestand holen
$query = "SELECT * FROM `content`";
$statement = $dbo->query( $query, PDO::FETCH_ASSOC ); 
$daten = $statement->fetchAll();

/*
echo '<pre>';
print_r( $daten );
echo '</pre>';
*/
?>

<?php include("html/html-header.php"); // html header und navbar holen ?>

		<section>
			<div class="container">
				
				<div class="row mt-4">
					<div class="col-8">
						<h1>Seitentexte</h1>
						
					</div>
					<div class="col-8">
					<a href="seite-edit.php" class="btn btn-primary">+ Neuer Seitentext</a>
					<!--
					<form class="form-inline" style="display:flex;">
						<input type="text" placeholder="suche..." class="form-control" style="width:100px"> <button type="submit" class="btn btn-light">Suche</button>
					</form>
					-->
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">ID</th>
						  <th scope="col">Titel</th>
						  <th scope="col"></th>
						  <th scope="col"></th>
						</tr>
					  </thead>
					  <tbody>
						<?php if( is_array($daten) && count($daten)>0 ){ ?>
						<?php foreach( $daten as $datensatz ) { ?>
						<tr>
						  <th scope="row"><?php echo $datensatz['ID']; ?></th>
						  <td><?php echo $datensatz['titel']; ?></td>
						  <td><a href="seite-edit.php?id=<?php echo $datensatz['ID']; ?>&action=edit">Bearbeiten</a></td>
						  <td><a href="seiten-liste.php?id=<?php echo $datensatz['ID']; ?>&action=delete">Löschen</a></td>
						</tr>
						<?php } // end foreach ?>
						<?php } // end if ?>
					  </tbody>
					</table>
					</div>
				</div>
			</div>
		</section>
		
<?php include("html/html-footer.php"); // html footer holen ?>		
