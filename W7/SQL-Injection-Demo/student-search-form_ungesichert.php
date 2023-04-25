<?php

$hasError = false; 
$conn = mysqli_connect( 'localhost', 'root', '', 'security_demo' );

if( isset($_GET['search']) ){
	$daten = array(); 
	
	if(empty($_GET['search'])){
		$hasError = true; 
		$errormsg = 'Es wurde kein Suchwort eingegeben, bitte einen Vornamen oder nachnamen eingeben'; 
	}
	if($hasError == false){
		$query = "SELECT * FROM studenten WHERE vorname ='".$_GET['search']."'";
		echo '<pre><small>debugger: <hr>'."\n".'</small>'.$query.'</pre>';
	
		$result  = mysqli_query($conn, $query );
		if ($result == true && mysqli_num_rows($result) > 0 ){
			$daten = mysqli_fetch_all($result, MYSQLI_ASSOC);
		}else{
			// echo mysqli_error($conn);
			$hasError = true; 
			$errormsg = 'Es ist ein Fehler bei der Abfrage der Datenbank geschehen. Bitte keine Sonderzeichen einfügen'; 
		}
	}
} 
?>
<html>
<head>
	<style>
	html, body { font-family:Arial Rounded, Arial, Helvetiva, sans-serif; }
	.button {
		background:#2684af;
		color:white;
		padding:0 25px;
		line-height:45px;
		display:inline-block;
		text-transform:uppercase;
		border-radius:5px;
		text-decoration:none;
		border:none;
	}
	.button:hover {
		background:#29a6db;
	}
	
	input {
		line-height:45px;
	}
	textarea {
		padding:10px 15px;
	}
	label {
		display:block;
	}
	form>div{
		margin-top:15px;
	}
	.error {
		border-radius:3px;
		border:2px solid orange;
		color:orange;
		background:#fff6e6;
		display:inline-block;
		padding:10px 20px;
	}
	pre {
		background:#ededed;
		border:#dedede;
		border-radius:5px;
		padding:10px 15px;
	}
	</style>
</head>
<div>
<h2>Studenten kontaktieren</h2>
<p>Füge den Namen eines Mit-Studenten ein, um ihn oder sie über unser <strong>sicheres und anonymes Kontaktformular</strong> zu kontaktieren.</p>

<form method="GET" action="">
	Suche: <input type="text" name="search">  <input type="submit" value="Suchen" class="button">
</form>
</div>

<?php if($hasError && isset( $errormsg ) ){ ?>
<div class="error">
<?php echo $errormsg; ?>
</div>
<?php } ?>

<h3>Resultate</h3>

<?php
if(isset($daten) ){
	if( count($daten) == 0){
		echo 'Nichts gefunden';
	}elseif(count($daten)>0 ){
		foreach($daten as $datensatz){
			?>
			<div>
				<strong><?php echo $datensatz['vorname'].' '.$datensatz['nachname']; ?></strong>
				[ <a href="?studentID=<?php echo $datensatz['ID']; ?>&studentName=<?php echo $datensatz['vorname'].' '.$datensatz['nachname']; ?>"><?php echo $datensatz['vorname']; ?> kontaktieren</a> ]
			</div>
			<hr>
			<?php
		}
	}
}
?>

<?php if( isset($_GET['studentID']) && isset($_GET['studentName']) ){ ?>
<hr>
<form>
	
	<div>
		<label>Deine Nachricht an <?php echo $_GET['studentName']; ?></label>
		<textarea name="nachricht"></textarea>
	</div>
	<div>
		<input type="submit" value="Nachricht senden" class="button">
	</div>
	<input type="hidden" name="studentID" value="<?php echo (int)$_GET['studentID']; ?>">
</form>
<?php } ?>
</html>